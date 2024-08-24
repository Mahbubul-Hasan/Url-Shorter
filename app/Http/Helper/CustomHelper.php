<?php

use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

function isAdmin() {
    return auth()->user()->isAdmin;
}

function dateFormat1($date) {
    return date('d M Y', strtotime($date));
}
function dateFormat1_1($date) {
    return date('d M Y h:i A', strtotime($date));
}

function makeSlug($sting) {
    return Str::slug($sting, '-');
}
function makeRandomString($length = 10) {
    $characters   = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $uniqueString = '';

    for ($i = 0; $i < $length; $i++) {
        $uniqueString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $uniqueString;
}

function roleHasPermissions($role) {
    $permissions   = Permission::all();
    $hasPermission = true;
    foreach ($permissions as $permission) {
        if (!$role->hasPermissionTo($permission->name)) {
            $hasPermission = false;
            return $hasPermission;
        }
    }
    return $hasPermission;
}
