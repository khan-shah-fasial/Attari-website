<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthenticateController extends Controller
{
    public function index(){
        return view('backend.auth.login');
    }

    public function login(request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);    

        $authenticated = Auth::guard('web')->attempt($request->only(['email', 'password']));
        if($authenticated)
        {

            // Generate OTP
            $otp = mt_rand(100000, 999999);
            $timestamp = Carbon::now();
            Session::put('otp', $otp);
            Session::put('otp_timestamp', $timestamp);
            Session::put('contact', $request->contact);
            
            $send_option = unmasked_url($request->contact);
            if (Str::contains($send_option, '@')) {
                $method = 'email';
            } else {
                $method = 'phone';
            }
                Session::put('method', $method); 
            // Send OTP via SMS using Twilio

            if ($method == 'phone') {

                $student_name = 'Admin';
    
                $data['student_name'] = rawurlencode($student_name);
                $data['template']    = 'LMS%20access%20OTP%2031st%20march';
                $data['use']          = 'otp_sms';
                $data['phone']        = unmasked_url($request->contact);
                $data['otp']          = $otp;
                send_sms_through_2factor($data);
    
            } else {

                $recipient = ''.unmasked_url($request->contact).''; 
                $subject  =  'OTP For Attari Classes Website';
             
        
                $body = 'New OTP For Attari Classes '.$otp;
                
                sendEmail($recipient, $subject, $body);
            }

            return redirect()->route('verify-otp');

            //return redirect()->route('backend.dashboard');
        }
        else
        {
            return redirect()->back()->withErrors(['invalid_credential' => 'Credential is invalid!']);
        }



    }

    public function verify_otp_form()
    {
        return view('backend.auth.verify_otp');
    }
    
    
    public function verifyOtp(Request $request)
    {
        $otp = Session::get('otp');
        $timestamp = Session::get('otp_timestamp');

        // Check if OTP expired (2 minutes)
        if (Carbon::parse($timestamp)->diffInMinutes(Carbon::now()) > 2) {
            return back()->withInput()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }

        if ($request->otp == $otp) {
            if(auth()->user()->role_id == 1){
                return redirect()->route('backend.dashboard');
            } else {
                return redirect()->route('course.index');
            }

        } else {
            return back()->withInput()->withErrors(['otp' => 'Invalid OTP']);
        }
    }

    public function resendOtp(Request $request)
    {
        $otp = mt_rand(100000, 999999);
        Session::put('otp', $otp);

        $timestamp = Carbon::now();
        Session::put('otp_timestamp', $timestamp);
        
        //$method = $request->method; // 'sms' or 'email'
        $contact = Session::get('contact');
        
        $send_option = unmasked_url($contact);
            if (Str::contains($send_option, '@')) {
                $method = 'email';
            } else {
                $method = 'sms';
            }
        if ($method == 'sms') {
            // Send OTP via SMS using Twilio
            /*
            $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
            $twilio->messages->create(
                $contact,
                [
                    'from' => env('TWILIO_FROM'),
                    'body' => "Your OTP is: $otp"
                ]
            );
            */

            $student_name = 'Admin';

            $data['student_name'] = rawurlencode($student_name);
            $data['template']    = 'LMS%20access%20OTP%2031st%20march';
            $data['use']          = 'otp_sms';
            $data['phone']        = unmasked_url($contact);
            $data['otp']          = $otp;
            send_sms_through_2factor($data);

        } elseif ($method == 'email') {
            // Send OTP via email


            $recipient = ''.unmasked_url($contact).''; 
            $subject  =  'OTP For Attari Classes Website';
         
    
            $body = 'New OTP For Attari Classes '.$otp;
            
            sendEmail($recipient, $subject, $body);
        }

        return redirect()->back()->with('message', 'OTP resent successfully.');
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('backend.login');
    }    
}
