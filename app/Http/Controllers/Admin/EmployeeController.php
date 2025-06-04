<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\EmployeeConformation;
use App\Models\Employee;
use App\Models\Permission;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmployeeController extends Controller
{
    public function index(){

        $employees = Employee::where('owner_user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.employee.index', compact('employees'));
    }
    public function create(){
        return view('admin.employee.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        'phone' => 'required',
        'role' => 'required',
        'id_number' => 'required',
        'address' => 'required',
        ]);
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->role = $validatedData['role'];
        $user->phone = $validatedData['phone'];
        $user->save();
        $employee = new Employee;
        $employee->owner_user_id = auth()->id();
        $employee->e_user_id = $user->id;
        $employee->id_number = $validatedData['id_number'];
        $employee->age = $request['age'];
        $employee->address = $validatedData['address'];
        $employee->save();

        $userId = $user->id;
    
        $submittedPermissions = $request->input('permissions', []);

        if(auth()->user()->role == 'admin')
            $modules = ['users', 'companies', 'vehicle', 'brands', 'categories', 'features', 'models', 'locations', 'featured_vehicles', 'analytics', 'earning_summary', 'transaction_history', 'calendar', 'bookings', 'financial', 'clients', 'user_ip', 'blogs', 'activity_log', 'contacts', 'currencies'];
        else 
            $modules = ['vehicle', 'locations', 'featured_vehicles', 'analytics', 'calendar', 'bookings', 'financial', 'earning_summary', 'transaction_history', 'clients', 'activity_log',];
        $actions = ['view', 'edit'];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $value = $submittedPermissions[$module][$action] ?? 0;
                // Create only if checked (value == 1)
                if ($value) {
                    Permission::create([
                        'user_id' => $userId,
                        'module' => $module,
                        'key' => $action,
                        'value' => 1,
                    ]);
                }
            }
        }
     
        // save logs 
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created [ User Name '.$validatedData['name'].'] [User Email '.$validatedData['email'].'] Successfully.';
        $action = 'Create';
        $module = 'User [Employee]';
        activityLog($userId, $desciption,$action,$module);
        $desciption = $userName.' Created [ Employee Name '.$validatedData['name'].'] [Employee Email '.$validatedData['email'].'] Successfully.';
        $action = 'Create';
        $module = 'Employee';
        activityLog($userId, $desciption,$action,$module);
        Mail::to($user->email)->send(new EmployeeConformation($user, $validatedData['password']));
        return redirect ()->route('employee')->with('status','Employee Created Successfully.');
    }
    public function edit($id){
        $employee = Employee::find($id);
        return view('admin.employee.edit', compact('employee'));
    }
    public function update($id, Request $request){
        $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'. $id,
        'phone' => 'required',
        'role' => 'required',
        'id_number' => 'required',
        'address' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->phone = $validatedData['phone'];
        $user->update();
        $employee = Employee::where('e_user_id',$id)->first();
        $employee->id_number = $validatedData['id_number'];
        $employee->age = $request['age'];
        $employee->address = $validatedData['address'];
        $employee->update();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ User Name '.$validatedData['name'].'] [User Email '.$validatedData['email'].'] Successfully.';
        $action = 'Update';
        $module = 'User [Employee]';
        activityLog($userId, $desciption,$action,$module);
        $desciption = $userName.' Updated [ Employee Name '.$validatedData['name'].'] [Employee Email '.$validatedData['email'].'] Successfully.';
        $action = 'Updated';
        $module = 'Employee';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('employee')->with('status', 'Employee Record Updated Successfully.');
    }
    public function destroy($id){
        $user = User::find($id);
        $permissions = Permission::where('user_id', $user->id);
        $permissions->delete();
        $user->delete();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted [ User Name '.$user->name.'] [User Email '.$user->email.'] Successfully.';
        $action = 'Delete';
        $module = 'User[Employee]';
        activityLog($userId, $desciption,$action,$module);
        $employee = Employee::where('e_user_id',$id)->first();
        $employee->delete();
        // save logs
        $desciption = $userName.' Deleted [ Employee Name '.$user->name.'] [Employee Email '.$user->email.'] Successfully.';
        $action = 'Delete';
        $module = 'User[Employee]';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('employee')-> with('statusDanger','Company Data Deleted Successfully.');
    }

}
