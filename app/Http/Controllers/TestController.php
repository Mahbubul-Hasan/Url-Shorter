<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class TestController extends Controller {
    public function index() {
        $user = User::where('email', 'mahbub@gmail.com')->first();
        return $user->password;
    }
}
