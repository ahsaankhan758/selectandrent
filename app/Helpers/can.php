<?php
function can($module, $action, $userId = null)
{
    $userId = $userId ?? auth()->id();

    $permission = \App\Models\Permission::where('user_id', $userId)
        ->where('module', $module)
        ->where('key', $action)
        ->where('value', 1)
        ->first();

    return $permission ? true : false;
}
