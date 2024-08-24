<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class TestController extends Controller {
    public function index() {
        $user = User::withCount('urlsWithTrashed')->first();
        return $user->getRoleNames()[0];
    }
}
