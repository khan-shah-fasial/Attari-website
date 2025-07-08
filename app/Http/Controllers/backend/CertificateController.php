<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    
    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'image' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }        
    
        // Upload image
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/image/certificate', 'public');
        } else {
            $imagePath = null;
        }
        
        // Create the Course record with 'Course_category_ids' included
        Certificate::create([
            'image' => $imagePath,
            'course_id' => $request->input('course_id'),
            'alt_image' => $request->input('alt_image'),
        ]);

        store_log($sentence = 'Upload a New Certificate in Course Page by');
    
        $response = [
            'status' => true,
            'notification' => 'Certificate added successfully!',
        ];
    
        return response()->json($response);
    }     

    public function edit($id) {
        $certificate = Certificate::find($id);
        return view('backend.pages.course.section.certificate.edit', compact('certificate'));
    }  
    
    public function delete($id) {
        
        $certificate = Certificate::find($id);
        if (!$certificate) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $certificate->delete();

        store_log($sentence = 'Delete a Certificate in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Certificate Deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $certificate = Certificate::find($id);
        $certificate->status = $status;
        
        $certificate->save();
        
        store_log($sentence = 'Status Change a Certificate in Course Page by');
    
        return redirect()->back()->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'image' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $certificate = Certificate::find($id);
    
        if ($request->hasFile('image')) {
            // Update the image if a new one is uploaded
            $imagePath = $request->file('image')->store('assets/image/certificate', 'public');
            $certificate->image = $imagePath;
        }else{
            if($request->has('image_check') && $certificate->image){
                Storage::disk('public')->delete($certificate->image);
                $certificate->image = null;
            }
        }

        $certificate->course_id = $request->input('course_id');
        $certificate->alt_image = $request->input('alt_image');
     
        $certificate->save();

        store_log($sentence = 'Update a Certificate in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Certificate updated successfully!',
        ];

        return response()->json($response);
    }   
}
