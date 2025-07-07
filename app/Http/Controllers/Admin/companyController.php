<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\CompanyCreated;
use App\Mail\CompanyStatusMail;
use App\Mail\CompanyVerificationMail;
use App\Models\Employee;
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
        // if(Auth::user()->role == 'company'){
        //     $companies = company::where('user_id', Auth::id() )->orderBy('created_at', 'desc')->paginate(20);
        //     return view('admin.company.index', compact('companies'));
        // }
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
        $company = new company;
        $company->user_id = $user->id;
        $company->name = $validatedData['companyName'];
        $company->email = $validatedData['companyEmail'];
        $company->phone = $validatedData['phone'];
        $company->website = $validatedData['website'];
        $company->save();
        Mail::to($user->email)->send(new CompanyCreated($company, $user));
        // save logs 
       $userId = Auth::id();
       $userName = Auth::user()->name;
       $desciption = $userName.' Created [ User Name: '.$validatedData['name'].' ] [ User Email: '.$validatedData['email'].' ] Successfully.';
       $action = 'Create';
       $module = 'User';
       activityLog($userId, $desciption,$action,$module);
       $desciption = $userName.' Created [ Company Name: '.$validatedData['companyName'].' ] [ Company Email: '.$validatedData['companyEmail'].' ] Successfully.';
       $action = 'Create';
       $module = 'Company';
       activityLog($userId, $desciption,$action,$module);
        // Send notification to admin 
        $adminId = User::where('role', 'admin')->value('id');
        $notificationType = 4; // register company
        $fromUserId = $user->id; // logged in user
        $toUserId = $adminId;
        $userId = $adminId; 
        $message = 'A new Company (' . $company->name . ') has registered and is awaiting your approval.';
        saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
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
        $desciption = $userName.' Updated [ Company Name: '.$validatedData['name'].' ] [ Company Email: '.$validatedData['email'].' ] Successfully.';
        $action = 'Update';
        $module = 'Company';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('companies')->with('status', 'Company Record Updated Successfully.');
    }
    public function deactivatedCompanies()
        {
            $companies = company::where('status','2')->orderBy('created_at', 'desc')->paginate(20);
            return view('admin.company.deactivated', compact('companies'));
        }
    public function deactivate(string $id)
    {
        $company = company::find($id);
        $company->status = '2';
        $company->save();
        $user = User::find($company->user_id);
        $user->status = '2';
        $user->save();
        $eUserIds = Employee::where('owner_user_id', $company->user_id)->pluck('e_user_id');
        Employee::where('owner_user_id', $company->user_id)->update(['status' => '2']);
        User::whereIn('id', $eUserIds)->update(['status' => '2']);
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deactivated  [ Company Name: '.$company->name.' ] [ Company Email: '.$company->email.' ] Successfully.';
         $action = 'Deactivated';
         $module = 'Company';
         activityLog($userId, $desciption,$action,$module);
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deactivated [ User Name: '.$user->name.' ] [ User Email: '.$user->email.' ] Successfully.';
         $action = 'Deactivated';
         $module = 'User';
         activityLog($userId, $desciption,$action,$module);
         Mail::to($company->user->email)->send(new CompanyStatusMail($company, 'inactive'));
        return redirect()->route('companies')-> with('statusDanger','Company Deactivated Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function activateCompany($id){
        $company = company::find($id);
        $company->status = '1';
        $company->save();
        $user = User::find($company->user_id);
        $user->status = '1';
        $user->save();
        $eUserIds = Employee::where('owner_user_id', $company->user_id)->pluck('e_user_id');
        Employee::where('owner_user_id', $company->user_id)->update(['status' => '1']);
        User::whereIn('id', $eUserIds)->update(['status' => '1']);
        
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Activated  [ Company Name: '.$company->name.' ] [ Company Email: '.$company->email.' ] Successfully.';
         $action = 'Activated';
         $module = 'Company';
         activityLog($userId, $desciption,$action,$module);
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Activated [ User Name: '.$user->name.' ] [ User Email: '.$user->email.' ] Successfully.';
         $action = 'Activated';
         $module = 'User';
         activityLog($userId, $desciption,$action,$module);
         Mail::to($company->user->email)->send(new CompanyStatusMail($company, 'active'));
        return redirect()->route('deactivatedCompanies')-> with('status','Company Activated Successfully.');
    }
    public function pending()
        {
            $companies = company::where('status','0')->orderBy('created_at', 'desc')->paginate(20);
            return view('admin.company.pending', compact('companies'));
        }
    public function destroyPending(string $id)
        {
            $company = company::find($id);
            $company->delete();
            $user = User::find($company->user_id);
            $user->delete();
            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Deleted [ Company Name: '.$company->name.' ] [ Company Email: '.$company->email.' ] Successfully.';
            $action = 'Delete';
            $module = 'Company';
            activityLog($userId, $desciption,$action,$module);
            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Deleted [ User Name: '.$user->name.' ] [ User Email: '.$user->email.' ] Successfully.';
            $action = 'Delete';
            $module = 'User';
            activityLog($userId, $desciption,$action,$module);
            return redirect()->route('pending')-> with('statusDanger','Company Data Deleted Successfully.');
        }
    public function aprovePending($id)
        {
            $company = company::find($id);
            $company->status = 1;
            $company->update();
          
            // Get Company Owner Email
            $user = User::find($company->user_id);
            $user->status = 1;
            $user->update();
            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Approved [ Company Name: '.$company->name.' ] Successfully.';
            $action = 'Approve';
            $module = 'Company';
            activityLog($userId, $desciption,$action,$module);
            // Send Confirmation Email
            Mail::to($user->email)->send(new CompanyApprovedMail($company));

            return redirect()->route('pending')->with('status', 'Company ' . $company->name . ' has been approved and an email has been sent.');
        }
}
