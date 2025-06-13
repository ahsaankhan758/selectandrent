<?php

use App\Models\Car;
  use App\Models\Booking;
  use App\Models\Contact;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
    function activityLog($user_id = 0,$description = '',$action = '',$module = '')
        {
            ActivityLog::create([
                'user_id' => $user_id,
                'action' => $action,
                'module' => $module,
                'description' => serialize($description),
            ]);
        }

function getBookingCount()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return Booking::count();
    }

    $owner = null;

    if ($user->role === 'employee') {
        $employee = DB::table('employees')->where('e_user_id', $user->id)->first();
        if ($employee) {
            $owner = User::find($employee->owner_user_id);
            if ($owner && $owner->role === 'admin') {
                return Booking::count(); 
            }
        }
    }

    if ($user->role === 'company' || ($owner && $owner->role === 'company')) {
        $companyId = $owner?->id ?? $user->id;

        return Booking::whereHas('booking_items.vehicle', function ($q) use ($companyId) {
            $q->where('user_id', $companyId);
        })->count();
    }

    return 0;
}

function getContactCount()
{
    return Contact::count();
}

function getCustomerBookingCount()
{
    return Booking::distinct('user_id')->count('user_id');
}

function getVehicleCount()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return Car::count();
    }

    $owner = null;

    if ($user->role === 'employee') {
        $employee = DB::table('employees')->where('e_user_id', $user->id)->first();
        if ($employee) {
            $owner = User::find($employee->owner_user_id);
            if ($owner && $owner->role === 'admin') {
                return Car::count(); 
            }
        }
    }

    if ($user->role === 'company' || ($owner && $owner->role === 'company')) {
        $companyId = $owner?->id ?? $user->id;

        return Car::where('user_id', $companyId)->count();
    }

    return 0;
}


