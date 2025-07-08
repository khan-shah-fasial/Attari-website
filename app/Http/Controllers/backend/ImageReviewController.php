<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImagesReview;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImageReviewController extends Controller
{
    
    public function index() {
        return view('backend.pages.course.section.imagereview.main-index');
    }
    
    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'image' => 'image|max:80',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }        
    
        // Upload image
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/image/images_review', 'public');
        } else {
            $imagePath = null;
        }
        
        // Create the Course record with 'Course_category_ids' included
        ImagesReview::create([
            'image' => $imagePath,
            'course_id' => $request->input('course_id'),
            'date' => $request->input('date'),
        ]);
    
        $response = [
            'status' => true,
            'notification' => 'Image added successfully!',
        ];
    
        return response()->json($response);
    }     

    public function edit($id) {
        $imagereview = ImagesReview::find($id);
        return view('backend.pages.course.section.imagereview.edit', compact('imagereview'));
    }  
    
    public function delete($id) {
        
        $imagereview = ImagesReview::find($id);
        if (!$imagereview) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $imagereview->delete();

        $response = [
            'status' => true,
            'notification' => 'Image Deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $imagereview = ImagesReview::find($id);
        $imagereview->status = $status;
        
        $imagereview->save();
        
    
        return redirect()->back()->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'image' => 'image|max:80',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $imagereview = ImagesReview::find($id);
    
        if ($request->hasFile('image')) {
            // Update the image if a new one is uploaded
            $imagePath = $request->file('image')->store('assets/image/imagereview', 'public');
            $imagereview->image = $imagePath;
        }else{
            $imagereview->image = $request->input('image_old');
            // if($request->has('image_check') && $imagereview->image){
            //     Storage::disk('public')->delete($imagereview->image);
            //     $imagereview->image = null;
            // }
        }

        $imagereview->course_id = $request->input('course_id');
        $imagereview->date = $request->input('date');
     
        $imagereview->save();

        $response = [
            'status' => true,
            'notification' => 'Image updated successfully!',
        ];

        return response()->json($response);
    }   
}
