<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learnings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class LearningsController extends Controller
{

    public function create(Request $request) {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:learnings',
            'course_id' => 'required',
            'heading_pdf_title' => 'required',
            'pdf_title' => 'required',
            'schedule_title' => 'required',
            'testimonials_title' => 'required',
            'faq_title' => 'required',
            'faq' => 'required',
            'more_info' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }
        
        $slug = Str::slug($request->input('slug'), '-');
    
        $pdf_title = $request->input('pdf_title');

    
        if (!empty($pdf_title[0])) {
            $pdf = [];
            for ($a = 0; $a < count($pdf_title); $a++) {
                $file = "pdf_$a";
                $list_pdf = $request->file($file)->store('assets/image/pdf', 'public');

                $pdf[] = [
                    'title' => $pdf_title[$a],
                    'pdf' => $list_pdf,   
                ]; 
            }
            $data['pdf'] = json_encode($pdf);
        } else {
            $data['pdf'] = '[]';
        }



        // Extract and handle FAQ data
        $faq = $request->input('faq');
        $faq_description = $request->input('faq_description');
    
        if (!empty($faq[0])) {
            $faqs = [];
            for ($j = 0; $j < count($faq); $j++) {
                $faqs[] = [
                    $faq[$j] => $faq_description[$j],
                ];
            }
            $data['faq'] = json_encode($faqs);
        } else {
            $data['faq'] = '[]';
        }
    
        // Remove the 'faq_description' key as it's not needed anymore
        unset($data['faq_description']);

        // Create the Learnings record 
        Learnings::create([
            'course_id' => $request->input('course_id'),
            'slug' => $slug,

            'heading_pdf_title' => $request->input('heading_pdf_title'),
            'pdf' => $data['pdf'],

            'schedule_title' => $request->input('schedule_title'),
            'testimonials_title' => $request->input('testimonials_title'),

            'faq_title' => $request->input('faq_title'),
            'faq' => $data['faq'],

            'page' => $request->input('page'),
            'more_info' => $request->input('more_info'),
        ]);
    
        $response = [
            'status' => true,
            'notification' => 'Learnings added successfully!',
        ];
    
        return response()->json($response);
    }


    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'slug' => 'required',
            'course_id' => 'required',
            'heading_pdf_title' => 'required',
            'pdf_title' => 'required',
            'schedule_title' => 'required',
            'testimonials_title' => 'required',
            'faq_title' => 'required',
            'faq' => 'required',
            'more_info' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }


        $id = $request->input('id');
        $Learnings = Learnings::find($id);

        //$old_pdf = json_decode($Learnings->pdf);
        $old_pdf = $request->input('view');

        $slug = Str::slug($request->input('slug'), '-');
    

        $pdf_title = $request->input('pdf_title');

    
        if (!empty($pdf_title[0])) {
            $pdf = [];
            for ($a = 0; $a < count($pdf_title); $a++) {
                $file = "pdf_$a";

                if ($request->hasFile($file) ) {
                    $list_pdf = $request->file($file)->store('assets/image/pdf', 'public');
                } else {
                    $add_old = $old_pdf[$a];
                    $list_pdf = $add_old;
                }

                $pdf[] = [
                    'title' => $pdf_title[$a],
                    'pdf' => $list_pdf,   
                ]; 
            }
            $data['pdf'] = json_encode($pdf);
        } else {
            $data['pdf'] = '[]';
        }

        // Extract and handle FAQ data
        $faq = $request->input('faq');
        $faq_description = $request->input('faq_description');
    
        if (!empty($faq[0])) {
            $faqs = [];
            for ($j = 0; $j < count($faq); $j++) {
                $faqs[] = [
                    $faq[$j] => $faq_description[$j],
                ];
            }
            $data['faq'] = json_encode($faqs);
        } else {
            $data['faq'] = '[]';
        }
    
        // Remove the 'faq_description' key as it's not needed anymore
        unset($data['faq_description']);


        $Learnings->course_id = $request->input('course_id');
        $Learnings->slug = $slug;
        
        $Learnings->heading_pdf_title = $request->input('heading_pdf_title');
        $Learnings->pdf = $data['pdf'];

        $Learnings->schedule_title = $request->input('schedule_title');
        $Learnings->testimonials_title = $request->input('testimonials_title');

        $Learnings->faq_title = $request->input('faq_title');
        $Learnings->faq = $data['faq'];

        $Learnings->page = $request->input('page');
        $Learnings->more_info = $request->input('more_info');
        
        $Learnings->statement   = $request->input('statement');
        $Learnings->youtube_url = $request->input('youtube_url');

        $Learnings->save();

        $response = [
            'status' => true,
            'notification' => 'Learnings updated successfully!',
        ];

        return response()->json($response);
    }   
}
