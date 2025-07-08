<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    
    public function index() {
        $log = Log::orderBy('id', 'desc')->get();
        return view('backend.pages.log.index', compact('log'));
    } 
    
}