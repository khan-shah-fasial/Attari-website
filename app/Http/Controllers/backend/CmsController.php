<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CmsController extends Controller
{
    public function index() {
        //$cms = Cms::orderBy('id', 'desc')->get();
        //return view('backend.pages.cms.index', compact('cms'));
        return view('backend.pages.cms.index');
    }

    public function getData(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');
        $order = $request->get('order')[0]['column'];
        $dir = $request->get('order')[0]['dir'];
    
        // Columns
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'slug',
            3 => 'zone',
            4 => 'status',
            5 => 'created_at'
        );
    
        // Total records
        $totalRecords = Cms::count();
    
        // Search value
        $searchValue = $request->input('search.value');
    
        // Filtered records
        $query = Cms::select('*');
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('title', 'like', "%$searchValue%")
                    ->orWhere('slug', 'like', "%$searchValue%")
                    ->orWhere('zone', 'like', "%$searchValue%")
                    ->orWhere('status', 'like', "%$searchValue%");
            });
        }
    
        // Filter by additional form parameters
        $title = $request->input('title');
        if (!empty($title)) {
            $query->where('title', 'like', "%$title%");
        }

        $slug = $request->input('slug');
        if (!empty($slug)) {
            $query->where('slug', 'like', "%$slug%");
        }
    
        $zone = $request->input('zone');
        if ($zone != '') {
            $query->where('zone', $zone);
        }
    
        $status = $request->input('status');
        if ($status != '') {
            $query->where('status', '=', $status);
        }
    
        // Get filtered count
        $totalFiltered = $query->count();
    
        // Order
        $query->orderBy($columns[$order], $dir);
    
        // Get records with pagination
        $records = $query->offset($start)
                        ->limit($rowperpage)
                        ->get();
    
        // Prepare data
        $data = [];
        $i = 1;
        foreach ($records as $row) {
            $nestedData = [
                'id' => $i++,
                'title' => $row->title,
                'slug' => $row->slug,
                'zone' => ($row->zone == 1) ? 'City' : (($row->zone == 2) ? 'Country' : 'Main'),
                'status' => $row->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>',
                'created_at' => $row->created_at->format('Y-m-d H:i:s'),
                'action' => '<a href="'.route('cms.status', ['id' => $row->id, 'status' => $row->status ? 0 : 1]).'" class="action-icon">'.
                                '<i class="'.($row->status ? 'ri-eye-off-fill' : 'ri-eye-fill').'" title="'.($row->status ? 'Inactive' : 'Active').'"></i>'.
                            '</a>'.
                            '<a href="javascript:void(0);" class="action-icon" onclick="largeModal(\''.route('cms.edit', ['id' => $row->id]).'\', \'Edit CMS\')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>'.
                            (auth()->user()->designation == 'SuperAdmin' ? 
        '<a href="javascript:void(0);" class="action-icon" onclick="confirmModalWithTextConfirmation(\''.route('cms.delete', $row->id).'\', responseHandler, \''.addslashes(extractWords($row->title, 3)).'\')">'.
            '<i class="mdi mdi-delete" title="Delete"></i>'.
        '</a>' 
    : '')
            ];
    
            $data[] = $nestedData;
        }
    
        // JSON response
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($totalRecords),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
    
        return response()->json($response);
    
        //return response()->json($json_data);
    }

    public function add() {
        $course = Course::where('status', 1)->get(['id', 'name', 'slug_url', 'meta_title', 'meta_description']);
        return view('backend.pages.cms.add', compact('course'));
    }  
    
    public function create(Request $request) {
        // Validate form data

        if ($request->zone == 0) {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'menu_title' => 'required',
                'breadcrumb_title' => 'required',
                'slug' => 'required|unique:cms',
                'description' => 'required',
            
                'course_id' => 'required',
            ]);
            
        } else {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'breadcrumb_title' => 'required',
                'slug' => 'required|unique:cms',
                'description' => 'required',
                
                'zone' => 'required',
                'alias' => 'required',

                'course_id' => 'required',
            ]);
            
        }


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }
        
        if($request->input('zone') == 0){
            $check = Cms::where('course_id', $request->input('course_id'))->where('zone', $request->input('zone'))->count();

            if ($check > 0) {
                return response()->json([
                    'status' => false,
                    'notification' => 'Zone Url Already exists'
                ], 200);
            }
        }
        
    
        $slug = customSlug($request->input('slug'));


        // Extract and handle replace_key data
        $replace_key = $request->input('replace_key');
        $replace_key_word = $request->input('replace_key_word');
    
        if (!empty($replace_key[0])) {
            $replace_keys = [];
            for ($j = 0; $j < count($replace_key); $j++) {
                $replace_keys[] = [
                    $replace_key[$j] => $replace_key_word[$j],
                ];
            }
            $data['replace_key'] = json_encode($replace_keys);
        } else {
            $data['replace_key'] = '[]';
        }

        unset($data['replace_key_word']);
    
        // Create the Cms record with 'Cms_category_ids' included
        Cms::create([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'menu_title' => $request->input('menu_title'),
            'breadcrumb_title' => $request->input('breadcrumb_title'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'replace_keyword' => $data['replace_key'],

            'alias' => $request->input('alias'),
            'zone' => $request->input('zone'),
        ]);

        store_log($sentence = 'Create a New CMS by');
    
        $response = [
            'status' => true,
            'notification' => 'CMS added successfully!',
        ];
    
        return response()->json($response);
    }   

    public function edit($id) {
        $cms = Cms::find($id);
        $course = Course::where('status', 1)->get(['id', 'name', 'slug_url', 'meta_title', 'meta_description']);
        return view('backend.pages.cms.edit', compact('cms', 'course'));
    }
    
    
    public function delete($id) {
        
        $cms = Cms::find($id);
        $cms->delete();

        store_log($sentence = 'Delete CMS by');

        $response = [
            'status' => true,
            'notification' => 'CMS deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $cms = Cms::find($id);
        $cms->status = $status;
        $cms->save();

        store_log($sentence = 'Status Change in CMS by');
    
        return redirect(route('cms.index'))->with('success', 'Status changed successfully!');
    }  
    
    public function update(Request $request) {

        if ($request->zone == 0) {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'menu_title' => 'required',
                'breadcrumb_title' => 'required',
                'slug' => 'required',
                'description' => 'required',
            
                'course_id' => 'required',
            ]);
            
        } else {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'breadcrumb_title' => 'required',
                'slug' => 'required',
                'description' => 'required',
                
                'zone' => 'required',
                'alias' => 'required',

                'course_id' => 'required',
            ]);
            
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $id = $request->input('id');
        $cms = Cms::find($id);
        
        if($cms->zone != 0)
        {
            if($request->input('zone') == 0){
                $check = Cms::where('course_id', $request->input('course_id'))->where('zone',  $request->input('zone'))->count();

                if ($check > 0) {
                    return response()->json([
                        'status' => false,
                        'notification' => 'Zone Url Already exists'
                    ], 200);
                }
            }
        }


            
        $slug = customSlug($request->input('slug'));


        // Extract and handle replace_key data
        $replace_key = $request->input('replace_key');
        $replace_key_word = $request->input('replace_key_word');
    
        if (!empty($replace_key[0])) {
            $replace_keys = [];
            for ($j = 0; $j < count($replace_key); $j++) {
                $replace_keys[] = [
                    $replace_key[$j] => $replace_key_word[$j],
                ];
            }
            $data['replace_key'] = json_encode($replace_keys);
        } else {
            $data['replace_key'] = '[]';
        }

        unset($data['replace_key_word']);


        $cms->course_id = $request->input('course_id');
        $cms->title = $request->input('title');
        $cms->menu_title = $request->input('menu_title');
        $cms->breadcrumb_title = $request->input('breadcrumb_title');
        $cms->slug = $slug;
        $cms->description = $request->input('description');
        $cms->replace_keyword = $data['replace_key'];


        $cms->alias = $request->input('alias');
        $cms->zone = $request->input('zone');

        $cms->save();

        store_log($sentence = 'Update a New CMS by');

        $response = [
            'status' => true,
            'notification' => 'CMS updated successfully!',
        ];

        return response()->json($response);
    }   
}
