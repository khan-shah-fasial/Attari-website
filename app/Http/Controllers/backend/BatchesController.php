<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BatchesController extends Controller
{

    public function create(Request $request) {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'paced_title' => 'required',
            'oc_title' => 'required',
            'corp_title' => 'required',
            'paced_pointer_list' => 'required',
            'oc_pointer_list' => 'required',
            'corp_pointer_list' => 'required',
            'batch_detail_date' => 'required',
            'batch_detail_sch' => 'required',
            // 'batch_detail_time' => 'required',
            'batch_detail_start_time' => 'required',
            'batch_detail_end_time' => 'required',
            'off_percentage' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }        
    
        // status 
        if ($request->has('batch_check')) {
            $status = $request->input('batch_check');
        } else {
            $status = 1;
        }

        $date = $request->input('batch_detail_date');
        $schedule = $request->input('batch_detail_sch');
        $remark = $request->input('batch_detail_remark');
        // $time = $request->input('batch_detail_time');
        $start_time = $request->input('batch_detail_start_time');
        $end_time = $request->input('batch_detail_end_time');
    
        if (!empty($date[0])) {
            $batch_detail = [];
            for ($j = 0; $j < count($date); $j++) {
                $batch_detail[] = [
                    'date' => $date[$j].' '.date('H:i:s'),
                    'schedule' => $schedule[$j],
                    'remark' => $remark[$j],
                    // 'time' => $time[$j],
                    'start_time' => $start_time[$j],    
                    'end_time' => $end_time[$j],   
                ];
            }
            $data['batch_detail'] = json_encode($batch_detail);
        } else {
            $data['batch_detail'] = '[]';
        }

        unset($data['batch_detail_date']);
        unset($data['batch_detail_sch']);
        unset($data['batch_detail_remark']);
        // unset($data['batch_detail_time']);
        unset($data['batch_detail_start_time']);
        unset($data['batch_detail_end_time']);
        
        
        // Create the Batch record 
        Batch::create([
            'course_id' => $request->input('course_id'),
            'paced_title' => $request->input('paced_title'),
            'paced_pointer_list' => json_encode($request->input('paced_pointer_list')),
            'oc_title' => $request->input('oc_title'),
            'oc_pointer_list' => json_encode($request->input('oc_pointer_list')),
            'batch_detail' => $data['batch_detail'],
            'corp_title' => $request->input('corp_title'),
            'corp_pointer_list' => json_encode($request->input('corp_pointer_list')),
            'corp_title' => $request->input('corp_title'),
            'corp_pointer_list' => json_encode($request->input('corp_pointer_list')),
            'off_percentage'=> $request->input('off_percentage'),
            'status' => $status,
        ]);
    
        $response = [
            'status' => true,
            'notification' => 'Batch added successfully!',
        ];
    
        return response()->json($response);
    }


    
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'paced_title' => 'required',
            'oc_title' => 'required',
            'corp_title' => 'required',
            'paced_pointer_list' => 'required',
            'oc_pointer_list' => 'required',
            'corp_pointer_list' => 'required',
            'batch_detail_date' => 'required',
            'batch_detail_sch' => 'required',
            // 'batch_detail_time' => 'required',
            'batch_detail_start_time' => 'required',
            'batch_detail_end_time' => 'required',
            'off_percentage' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $date = $request->input('batch_detail_date');
        $schedule = $request->input('batch_detail_sch');
        $remark = $request->input('batch_detail_remark');
        // $time = $request->input('batch_detail_time');
        $start_time = $request->input('batch_detail_start_time');
        $end_time = $request->input('batch_detail_end_time');
    
        if (!empty($date[0])) {
            $batch_detail = [];
            for ($j = 0; $j < count($date); $j++) {
                $batch_detail[] = [
                    'date' => $date[$j].' '.date('H:i:s'),
                    'schedule' => $schedule[$j],
                    'remark' => $remark[$j],
                    // 'time' => $time[$j], 
                    'start_time' => $start_time[$j],    
                    'end_time' => $end_time[$j],  
                ];
            }
            $data['batch_detail'] = json_encode($batch_detail);
        } else {
            $data['batch_detail'] = '[]';
        }

        unset($data['batch_detail_date']);
        unset($data['batch_detail_sch']);
        unset($data['batch_detail_remark']);
        // unset($data['batch_detail_time']);
        unset($data['batch_detail_start_time']);
        unset($data['batch_detail_end_time']);



        $id = $request->input('id');
        $Batch = Batch::find($id);
    

        $Batch->course_id = $request->input('course_id');

        $Batch->paced_title = $request->input('paced_title');
        $Batch->paced_pointer_list = json_encode($request->input('paced_pointer_list'));

        $Batch->oc_title = $request->input('oc_title');
        $Batch->oc_pointer_list = json_encode($request->input('oc_pointer_list'));

        $Batch->batch_detail = $data['batch_detail'];

        $Batch->corp_title = $request->input('corp_title');
        $Batch->corp_pointer_list = json_encode($request->input('corp_pointer_list'));

        $Batch->corp_title = $request->input('corp_title');
        $Batch->corp_pointer_list = json_encode($request->input('corp_pointer_list'));

        if ($request->has('batch_check')) {
            $status = $request->input('batch_check');
        } else {
            $status = 1;
        }

        $Batch->off_percentage = $request->input('off_percentage');

        $Batch->status = $status;


        $Batch->save();

        $response = [
            'status' => true,
            'notification' => 'Batch updated successfully!',
        ];

        return response()->json($response);
    }   
}
