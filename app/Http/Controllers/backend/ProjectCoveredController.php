<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCovered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProjectCoveredController extends Controller
{
    
    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'title_no' => 'required|numeric',
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'icon' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }        
    
        // Upload image
        
        if ($request->hasFile('icon')) {
            $imagePath = $request->file('icon')->store('assets/image/project_covered', 'public');
        } else {
            $imagePath = null;
        }
        
        // Create the Course record with 'Course_category_ids' included
        ProjectCovered::create([
            'title_no' => $request->input('title_no'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'icon' => $imagePath,
            'course_id' => $request->input('course_id'),
        ]);

        store_log($sentence = 'Projects Covered Add in Course Page by');

    
        $response = [
            'status' => true,
            'notification' => 'Project Covered added successfully!',
        ];
    
        return response()->json($response);
    }     

    public function edit($id) {
        $project_covered = ProjectCovered::find($id);
        return view('backend.pages.course.section.project_covered.edit', compact('project_covered'));
    }  
    
    public function delete($id) {
        
        $project_covered = ProjectCovered::find($id);
        if (!$project_covered) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $project_covered->delete();

        store_log($sentence = 'Delete Projects Covered in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Project Covered Deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $project_covered = ProjectCovered::find($id);
        $project_covered->status = $status;
        $project_covered->save();
        
        store_log($sentence = 'Status Change Projects Covered in Course Page by');
    
        return redirect()->back()->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'title_no' => 'required|numeric',
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'icon' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $project_covered = ProjectCovered::find($id);
    
        if ($request->hasFile('icon')) {
            // Update the image if a new one is uploaded
            $imagePath = $request->file('icon')->store('assets/image/project_covered', 'public');
            $project_covered->icon = $imagePath;
        }else{
            if($request->has('icon_check') && $project_covered->icon){
                Storage::disk('public')->delete($project_covered->icon);
                $project_covered->icon = null;
            }
        }

        $project_covered->title_no = $request->input('title_no');
        $project_covered->title = $request->input('title');
        $project_covered->description = $request->input('description');
        $project_covered->course_id = $request->input('course_id');
     
        $project_covered->save();

        store_log($sentence = 'Update Projects Covered in Course Page by');

        $response = [
            'status' => true,
            'notification' => 'Project Covered updated successfully!',
        ];

        return response()->json($response);
    }   
}
