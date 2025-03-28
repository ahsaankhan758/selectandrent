<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyApprovedMail;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\User;
use SebastianBergmann\Environment\Console;
use Auth;

class companyController extends Controller
{
    public function showLoginForm()
        {
            return view('company.login');
        }
    public function redirectToCompanyLogin()
        {
            return redirect('company/login');
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = company::where('status','1')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate all required fields at once
        $validatedData = $request->validate([
            'name' => 'required',
            'companyName' => 'required|unique:companies,name',
            'email' => 'required|email|unique:users,email',
            'companyEmail' => 'required|email|unique:companies,email',
            'password' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);
        $user = new User;
        $user->name =  $validatedData['name'];
        $user->email =  $validatedData['email'];
        $user->password =  $validatedData['password'];
        $user->role = 'company';
        $user->save();
        $compnay = new company;
        $compnay->user_id = $user->id;
        $compnay->name = $validatedData['companyName'];
        $compnay->email = $validatedData['companyEmail'];
        $compnay->phone = $validatedData['phone'];
        $compnay->website = $validatedData['website'];
        $compnay->save();
        // save logs 
       $userId = Auth::id();
       $userName = Auth::user()->name;
       $desciption = $userName.' Created [ User Name '.$validatedData['name'].'] [User Email '.$validatedData['email'].'] Successfully.';
       $action = 'Create';
       $module = 'User';
       activityLog($userId, $desciption,$action,$module);
       $desciption = $userName.' Created [ Company Name '.$validatedData['companyName'].'] [Company Email '.$validatedData['companyEmail'].'] Successfully.';
       $action = 'Create';
       $module = 'Company';
       activityLog($userId, $desciption,$action,$module);
        return redirect ()->route('companies')->with('status','Company Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = company::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'website' => 'required',
        ]);
        $company = company::find($id);
        $company->name = $validatedData['name'];
        $company->email = $validatedData['email'];
        $company->phone = $validatedData['phone'];
        $company->website = $validatedData['website'];
        $company->update();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ Company Name '.$validatedData['name'].'] [Company Email '.$validatedData['email'].'] Successfully.';
        $action = 'Update';
        $module = 'Company';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('companies')->with('status', 'Company Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = company::find($id);
        $company->delete();
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deleted [ Company Name '.$company->name.'] [Company Email '.$company->email.'] Successfully.';
         $action = 'Delete';
         $module = 'Company';
         activityLog($userId, $desciption,$action,$module);
        return redirect()->route('companies')-> with('status','Comapy Data Deleted Successfully.');
    }
    public function pending()
        {
            $companies = company::where('status','0')->orderBy('created_at', 'desc')->paginate(20);
            return view('admin.company.pending', compact('companies'));
        }
    public function aprovePending($id)
        {
            $company = company::find($id);
            $company->status = 1;
            $company->update();
            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Approved [ Company Name '.$company->name.'] Successfully.';
            $action = 'Approve';
            $module = 'Company';
            activityLog($userId, $desciption,$action,$module);
            // Send Confirmation Email
            Mail::to($company->email)->send(new CompanyApprovedMail($company));

            return redirect()->route('pending')->with('status', 'Company ' . $company->name . ' has been approved and an email has been sent.');
        }
}
