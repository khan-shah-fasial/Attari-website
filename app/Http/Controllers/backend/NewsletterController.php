<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index() {
        $newsletter = Newsletter::orderBy('id', 'desc')->get();
        return view('backend.pages.newsletter.index', compact('newsletter'));
    }    

    public function delete($id) {
        
        $newsletter = Newsletter::find($id);
        if (!$newsletter) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $newsletter->delete();

        $response = [
            'status' => true,
            'notification' => 'Newsletter Deleted successfully!',
        ];

        return response()->json($response);
    }  
  
}
