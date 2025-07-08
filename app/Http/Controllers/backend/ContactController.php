<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /*public function index() {
        //$contact = Contact::orderBy('id', 'desc')->get();
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        
        return view('backend.pages.contact.index', compact('contacts'));
    }*/ 
    
    public function index(Request $request)
    {
        $query = Contact::query();
        
        if ($request->filled('course')) {
            $query->where('services', 'like', '%' . $request->course . '%');
        }        
    
        // Handle date range filtering based on 'created_at' or 'updated_at'
        if ($request->filled('from_date') || $request->filled('to_date')) {
    
            if ($request->filled('from_date') && $request->filled('to_date')) {
                $fromDate = $request->from_date.date(' 00:00:00');
                $toDate = $request->to_date.date(' 23:59:59') ?: now(); // Use current date if 'to_date' is empty
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            } 
            elseif ($request->filled('to_date')) {
                $toDate = $request->to_date.' 23:59:59';
                $query->where('created_at', '<=', $toDate);
            }
            elseif ($request->filled('from_date')) {
                $fromDate = $request->from_date.date(' 00:00:00');
                $query->where('created_at', '>=', $fromDate);
            }
        }
    
        // Order by 'created_at' and paginate
        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        
    $uniqueCourses = \App\Models\Contact::select('services')
        ->whereNotNull('services')
        ->distinct()
        ->orderBy('services', 'desc')
        ->pluck('services');
        
        $uniqueCourses = DB::table('courses')
    ->distinct()
    ->pluck('alias');
                
        return view('backend.pages.contact.index', compact('contacts', 'uniqueCourses'));
    }
    

    public function view($id) {
        $contact = Contact::find($id);
        return view('backend.pages.contact.view', compact('contact'));
    }  
    
    public function delete($id) {
        
        $contact = Contact::find($id);
        if (!$contact) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $contact->delete();

        $response = [
            'status' => true,
            'notification' => 'Contact Deleted successfully!',
        ];

        return response()->json($response);
    }  
    /*
    public function status($id, $status) { 
        $contact = Contact::find($id);
        $contact->status = $status;
        $contact->save();
    
        return redirect(route('Contact.index'))->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {
        $id = $request->input('id');
        $contact = Contact::find($id);
        $contact->update($request->all());

        $response = [
            'status' => true,
            'notification' => 'Contact Update successfully!',
        ];

        return response()->json($response);
    } */   
}
