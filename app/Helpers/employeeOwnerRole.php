<?php
use App\Models\Employee;
use App\Models\User;
function ownerRole($id){
    $ownerUserId = Employee::where('e_user_id', $id)->value('owner_user_id');
    $ownerRole = User::find($ownerUserId)?->role;
    return $ownerRole;
}
?>