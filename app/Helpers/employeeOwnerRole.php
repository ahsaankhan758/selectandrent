<?php
use App\Models\Employee;
use App\Models\User;
function owner($id){
    $ownerUserId = Employee::where('e_user_id', $id)->value('owner_user_id');
    $owner = User::find($ownerUserId);
    return $owner;
}
?>