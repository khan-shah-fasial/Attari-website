<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoReview;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class VideoReviewController extends Controller
{
    
    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'image' => 'required',
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }
        
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/image/video_review', 'public');
        }
           
        // Create the Course record with 'Course_category_ids' included
        VideoReview::create([
            'url' => $request->input('url'),
            'course_id' => $request->input('course_id'),
            'image' => $imagePath,
        ]);

        store_log($sentence = 'Upload a New Video Review URL in Course Page by');
    
        $response = [
            'status' => true,
            'notification' => 'Video added successfully!',
        ];
    
        return response()->json($response);
    }     

    public function edit($id) {
        $videoreview = VideoReview::find($id);
        return view('backend.pages.course.section.videoreview.edit', compact('videoreview'));
    }  
    
    public function delete($id) {
        
        $videoreview = VideoReview::find($id);
        if (!$videoreview) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $videoreview->delete();

        store_log($sentence = 'Delete a Video Review URL in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Video Deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $videoreview = VideoReview::find($id);
        $videoreview->status = $status;
        $videoreview->save();
        
        store_log($sentence = 'Status Change a Video Review URL in Course Page by');
    
        return redirect()->back()->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $videoreview = VideoReview::find($id);


        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image (if it exists)
            if ($videoreview->image) {
                Storage::disk('public')->delete($videoreview->image);
            }

            $imagePath = $request->file('image')->store('assets/image/video_review', 'public');
            $videoreview->image = $imagePath;
        }
    
        $videoreview->url = $request->input('url');
        $videoreview->course_id = $request->input('course_id');
     
        $videoreview->save();

        store_log($sentence = 'Update a Video Review URL in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Video updated successfully!',
        ];

        return response()->json($response);
    }   
}
