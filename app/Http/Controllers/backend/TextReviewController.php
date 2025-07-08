<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TextReview;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TextReviewController extends Controller
{
    
    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'image',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }        
    
        // Upload image
        
        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('assets/image/text_review', 'public');
        } else {
            $imagePath = null;
        }
        
        // Create the Course record with 'Course_category_ids' included
        TextReview::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'thumbnail' => $imagePath,
            'course_id' => $request->input('course_id'),
            'profile'   => $request->input('profile'),
            'url' => $request->input('url'),
        ]);

        store_log($sentence = 'Text Review ADD in Course Page by');
    
        $response = [
            'status' => true,
            'notification' => 'Text Review added successfully!',
        ];
    
        return response()->json($response);
    }     

    public function edit($id) {
        $textreview = TextReview::find($id);
        return view('backend.pages.course.section.textreview.edit', compact('textreview'));
    }  
    
    public function delete($id) {
        
        $textreview = TextReview::find($id);
        if (!$textreview) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $textreview->delete();

        store_log($sentence = 'Delete Text Review in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'TextReview Deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $textreview = TextReview::find($id);
        $textreview->status = $status;
        $textreview->save();
        
        store_log($sentence = 'Status Change Text Review in Course Page by');
    
        return redirect()->back()->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'image',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $textreview = TextReview::find($id);
    
        if ($request->hasFile('thumbnail')) {
            // Update the image if a new one is uploaded
            $imagePath = $request->file('thumbnail')->store('assets/image/textreview', 'public');
            $textreview->thumbnail = $imagePath;
        }else{
            if($request->has('thumbnail_check') && $textreview->thumbnail){
                Storage::disk('public')->delete($textreview->thumbnail);
                $textreview->thumbnail = null;
            }
        }

        $textreview->name = $request->input('name');
        $textreview->description = $request->input('description');
        $textreview->type = $request->input('type');
        $textreview->course_id = $request->input('course_id');
        $textreview->profile = $request->input('profile');
        $textreview->url = $request->input('url');
     
        $textreview->save();

        store_log($sentence = 'Update Text Review in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Course updated successfully!',
        ];

        return response()->json($response);
    }   
}
