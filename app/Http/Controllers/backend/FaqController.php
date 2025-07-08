<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Faq;

class FaqController extends Controller
{

    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'course_id' => 'required',
            'title_no'  => 'required',
            'zone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }     

        $faq = Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'zone' => $request->input('zone'),
            'course_id' => $request->input('course_id'),
            'title_no' => $request->input('title_no'),
        ]);

        store_log($sentence = 'Create a New Faq in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Faq added successfully!',
        ];
        
        return response()->json($response);
    }     

    public function edit($id) {
        $faq = Faq::find($id);
        return view('backend.pages.course.section.faq.edit', compact('faq'));
    }  
    
    public function delete($id) {
        
        $faq = Faq::find($id);
        if (!$faq) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $faq->delete();

        $response = [
            'status' => true,
            'notification' => 'Faq deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $faq = Faq::find($id);
        $faq->status = $status;
        $faq->save();
    
        return redirect()->back()->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'zone' => 'required',
            'course_id' => 'required',
            'title_no' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $faq = Faq::find($id);
        $faq->update($request->all());

        store_log($sentence = 'Update a Faq in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Faq updated successfully!',
        ];

        return response()->json($response);
    }   
}
