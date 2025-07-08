<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('backend.pages.company.index', compact('companies'));
    }

    public function create()
    {
        return view('backend.pages.company.add');
    }

    public function store(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'domain' => 'required|url',
            'owner' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // If validation fails, return validation errors
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ]);
        }

        // Set the timezone to Asia/Kolkata
        date_default_timezone_set('Asia/Kolkata');
        
       $c1 = Company::first();

        // Create the Company record with current timestamp in Asia/Kolkata timezone
        $company = new Company($request->all());
        $company->created_at = Carbon::now();
        if(isset($c1)){
            $company->terms_and_conditions = $c1->terms_and_conditions;
            $company->refund_policy = $c1->refund_policy;
            $company->privacy_policy = $c1->privacy_policy;           
        }
        $company->save();

        // Return a success response
        return response()->json([
            'status' => true,
            'notification' => 'Company created successfully!',
        ]);
    }



    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('backend.pages.company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        // Check if the company record exists after updating
        $company = Company::find($id);
        if (!$company) {
            $response = [
                'status' => false,
                'notification' => 'Record not found!',
            ];
            return response()->json($response);
        }

        // Set the timezone to Asia/Kolkata
        date_default_timezone_set('Asia/Kolkata');

        // Update the 'updated_at' attribute with the current timestamp in Asia/Kolkata timezone
        $company->updated_at = Carbon::now();
        $company->save();

        // If the company record exists, return a success response
        $response = [
            'status' => true,
            'notification' => 'Company updated successfully!',
        ];

        return response()->json($response);
    }



    public function destroy($id)
    {
        $company = Company::find($id);
        if (!$company) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $company->delete();

        $response = [
            'status' => true,
            'notification' => 'Company deleted successfully!',
        ];

        return response()->json($response);
    }
    public function savepoliciesForm()
    {
        // Fetch policy values from the database
        $company = Company::first(); // Assuming you have a model named 'Company'

        // Pass the policy values to the view
        return view('backend.pages.company.policy', compact('company'));
    }
    public function savepoliciesPost(Request $request)
    {
      // Validate form data
    $validator = Validator::make($request->all(), [
        'terms_and_conditions' => 'required',
        'refund_policy' => 'required',
        'privacy_policy' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'notification' => $validator->errors()->all()
        ]);
    }

    // Retrieve all companies
    $companies = Company::all();

    // Update each company with the new policies
    foreach ($companies as $company) {
        $company->update([
            'terms_and_conditions' => $request->input('terms_and_conditions'),
            'refund_policy' => $request->input('refund_policy'),
            'privacy_policy' => $request->input('privacy_policy')
        ]);
    }

    // Retrieve the first company from the database
    $firstCompany = Company::first();

    // Return the data of the first company
    return response()->json([
        'status' => true,
        'notification' => 'Policies updated successfully for all companies!',
        'firstCompany' => $firstCompany
    ]);
    } 
    

}