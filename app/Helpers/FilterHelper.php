<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FilterHelper
{
    public static function companyFilter()
    {
        return function ($query) {
            if (!Auth::check()) return;

            $user = Auth::user();

            if ($user->role === 'admin') return;

            if ($user->role === 'company') {
                $companyId = $user->id;
            } elseif ($user->role === 'employee') {
                $employee = DB::table('employees')->where('e_user_id', $user->id)->first();
                if (!$employee) return;
                $owner = User::find($employee->owner_user_id);
                if (!$owner || $owner->role !== 'company') return;
                $companyId = $owner->id;
            } else {
                return;
            }

            $query->whereHas('booking_items.vehicle', function ($q) use ($companyId) {
                $q->where('user_id', $companyId);
            });
        };
    }

    public static function carFilter()
    {
        return function ($query) {
            if (!Auth::check()) return;

            $user = Auth::user();

            if ($user->role === 'company') {
                $query->where('user_id', $user->id);
            } elseif ($user->role === 'employee') {
                $employee = DB::table('employees')->where('e_user_id', $user->id)->first();
                if (!$employee) return;
                $owner = User::find($employee->owner_user_id);
                if ($owner && $owner->role === 'company') {
                    $query->where('user_id', $owner->id);
                }
            }
        };
    }
}
