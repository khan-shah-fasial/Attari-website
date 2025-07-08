<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function getRoleId(Request $request)
    {
        // Retrieve email from the request
        $email = $request->input('email');

        // Find the user by email
        $user = User::where('email', $email)->first();
         $options = '<option value="">-- Select --</option>';
        // Check if the user exists
        if ($user) {
            // If user is found, explode the array of otps
            $otps = json_decode($user->otps);
            
           $arrayData = json_decode($user->otps, true);

             $options = "";
            foreach ($arrayData as $key => $value) {
                 //var_dump($key);
                 foreach($value as $k => $y):
                     //var_dump($k.'-'.$y);
                     $options .= "<option value=\"" . masked_url($k) . "\">$y</option>";
                 endforeach;
                  
            } 
            return $options;
            

        
            
            
            // Create an array to hold the options
            // $options = [];
            // foreach ($otps as $key => $value) {
            //     // Add each key-value pair as an option
            //     $options[] = ['value' => masked_url($value), 'text' => $key];
            // }

            
            // // Return the options as JSON response
            // return response()->json($options);
        } else {
            // If user is not found, return an error response
            return $options;
        }
    }
}

