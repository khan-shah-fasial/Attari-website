<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Contact;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index(){
        $courseCount = Course::count();
        $postCount = Blog::count();
        $teamCount = Team::count();
        $contactCount = Contact::count();
        return view('backend.pages.dashboard.index', compact('courseCount', 'postCount', 'teamCount', 'contactCount'));
    }
}
