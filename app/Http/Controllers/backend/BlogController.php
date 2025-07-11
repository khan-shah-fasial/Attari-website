<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Course;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(Request $request) {
        $query = Blog::query();
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('invisible')) {
            $query->where('invisible', $request->invisible);
        }
        if ($request->filled('course')) {
            $query->where('course_id', $request->course);
        }
        if ($request->filled('featured')) {
            $query->where('featured', $request->featured);
        }
        // Handle date range filtering based on 'date_field'
        if ($request->filled('date_field')) {
            $dateField = $request->date_field; // 'created_at' or 'updated_at'
            // Apply 'from_date' and 'to_date' if both are provided
            if ($request->filled('from_date') && $request->filled('to_date')) {
                $fromDate = $request->from_date;
                $toDate = $request->to_date ?: now(); // Use current date if 'to_date' is empty
                $query->whereBetween($dateField, [$fromDate, $toDate]);
            } 
            // Apply 'to_date' only if 'from_date' is not provided
            elseif ($request->filled('to_date')) {
                $toDate = $request->to_date;
                $query->where($dateField, '<=', $toDate . ' 23:59:59');
            }
            // Apply 'from_date' only if 'to_date' is not provided
            elseif ($request->filled('from_date')) {
                $fromDate = $request->from_date;
                $query->where($dateField, '>=', $fromDate);
            }
        }
        $blog = $query->orderBy('updated_at', 'desc')->paginate(50);
        $courses = Course::where('status', 1)->get(['id', 'name']);
        return view('backend.pages.blog.index', compact('blog', 'courses'));
    }
    
    /*public function index() {
        $blog = Blog::orderBy('id', 'desc')->get();
        return view('backend.pages.blog.index', compact('blog'));
    }*/

    public function add() {
        $blogcategory = BlogCategory::where('status', 1)->get();
        $course = Course::where('status', 1)->get(['id', 'name']);
        $users = User::all();
        return view('backend.pages.blog.add', compact('blogcategory', 'users', 'course'));
    }  
    
    public function create(Request $request) {

        if ($request->input('status') == 1) {
            // Validate form data
            $validator = Validator::make($request->all(), [
                'image' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048', // 2mb = 2048kb
                'slug' => 'required|unique:blogs',
                'course_id' => 'required',
                'title' => 'required|max:255', // Changed max225 to max:255
                'short_description' => 'nullable|min:10', // Changed max 255 to max:255
                'meta_title' => 'required|max:250', // Changed mx250 to max:250
                'meta_description' => 'required', // Changed max255 to max:255
                'alt_main_image' => 'nullable|max:250', // Added missing quotes and colon before max, and fixed missing single quote
                'status' => 'required|boolean',
                'invisible' => 'required|boolean',
                'featured' => 'required|boolean',
            ]);
        } else {
            // Validate form data
            $validator = Validator::make($request->all(), [
                'slug' => 'required|unique:blogs',
                'title' => 'required|max:255', // Changed max225 to max:255
                'course_id' => 'required',
                'meta_title' => 'nullable|max:250', // Changed mx250 to max:250
                'alt_main_image' => 'nullable|max:250',
            ]);
        }
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }
    
        // Upload image if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/image/blog', 'public');
        }
    
        $slug = Str::slug($request->input('slug'), '-');
    
        // Create the Blog record with 'blog_category_ids' included
        DB::table('blogs')->insert([
            'blog_category_ids' => json_encode($request->input('blog_category_ids')),
            'title' => $request->input('title'),
            'slug' => $slug,
            'short_description' => $request->input('short_description'),
            'content' => $request->input('content'),
            'main_image' => $imagePath,
            'alt_main_image' => $request->input('alt_main_image'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'user_id' => $request->input('user_id'),
            'status' => $request->input('status'),
            'invisible' => $request->input('invisible'),
            'featured' => $request->input('featured'),
            'course_id' => $request->input('course_id'),
            'text_testimonial' => $request->has('text_testimonial') ? '1' : '0',
            'video_testimonial' => $request->has('video_testimonial') ? '1' : '0',
            'batch_schedule' => $request->has('batch_schedule') ? '1' : '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    
        $response = [
            'status' => true,
            'notification' => 'Blog created successfully!',
        ];
    
        return response()->json($response);
    } 

    public function edit($id) {
        $blog = Blog::find($id);
        $blogcategory = BlogCategory::where('status', 1)->get();
        $course = Course::where('status', 1)->get(['id', 'name']);
        $users = User::all();        
        return view('backend.pages.blog.edit', compact('blog', 'blogcategory','users', 'course'));
    }
    
    public function view($id) {
        $blog = Blog::find($id);
        return view('backend.pages.blog.view', compact('blog'));
    }  
    
    public function delete($id) {
        
        $blog = Blog::find($id);
        if (!$blog) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $blog->delete();

        $response = [
            'status' => true,
            'notification' => 'Blog deleted successfully!',
        ];

        return response()->json($response);
    }  
    
    public function status($id, $status) { 
        $blog = Blog::find($id);
        $blog->status = $status;
        $blog->save();
    
        return redirect(route('blogs.index'))->with('success', 'Status Change successfully!');
    }  
    
    public function update(Request $request) {
        if ($request->input('status') == 1) {
            $validator = Validator::make($request->all(), [
                'image' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048', // 2mb = 2048kb
                'slug' => 'required|unique:blogs,slug,'. $request->input('id'),
                'course_id' => 'required',
                'title' => 'required|max:255', // Changed max225 to max:255
                'short_description' => 'nullable|min:10', // Changed max 255 to max:255
                'meta_title' => 'required|max:250', // Changed mx250 to max:250
                'meta_description' => 'required', // Changed max255 to max:255
                'alt_main_image' => 'nullable|max:250', // Added missing quotes and colon before max, and fixed missing single quote
                'status' => 'required|boolean',
                'invisible' => 'required|boolean',
                'featured' => 'required|boolean',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'slug' => 'required|unique:blogs,slug,'. $request->input('id'),
                'title' => 'required|max:255',
                'course_id' => 'required',
                'meta_title' => 'max:250',
                'alt_main_image' => 'nullable|max:250', 
            ]);        
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        } 

        $id = $request->input('id');
        $blog = Blog::find($id);
        if ($request->input('status') == 1) {
            if (!$request->hasFile('image')) {
                if ($blog->main_image == null || $blog->main_image === '' || empty($blog->main_image)) {
                    if($request->input('invisible') == 0){
                           $response = [
                        'status' => false,
                        'notification' => 'Please insert the image',
                    ];
                
                    return response()->json($response);                 
                    }

                }
            }           
        }

    
        if ($request->hasFile('image')) {
            // Update the image if a new one is uploaded
            $imagePath = $request->file('image')->store('assets/image/blog', 'public');
            $blog->main_image = $imagePath;
        }
        
        $slug = Str::slug($request->input('slug'), '-');

        $blog->blog_category_ids = json_encode($request->input('blog_category_ids'));
        $blog->title = $request->input('title');
        $blog->slug = $slug;
        $blog->alt_main_image = $request->input('alt_main_image');
        $blog->short_description = $request->input('short_description');
        $blog->content = $request->input('content');
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->user_id = $request->input('user_id');
        $blog->status = $request->input('status');
        $blog->invisible = $request->input('invisible');
        $blog->featured = $request->input('featured');
        $blog->course_id = $request->input('course_id');
        $blog->text_testimonial = $request->has('text_testimonial') ? '1' : '0';
        $blog->video_testimonial = $request->has('video_testimonial') ? '1' : '0';
        $blog->batch_schedule = $request->has('batch_schedule') ? '1' : '0';
        $blog->updated_at = date('Y-m-d H:i:s');
        // $blog->updated_at = date('Y-m-d H:i:s', strtotime($request->input('updated_at')));
        $blog->save();

        $response = [
            'status' => true,
            'notification' => 'Blog updated successfully!',
        ];

        return response()->json($response);
    }   
}
