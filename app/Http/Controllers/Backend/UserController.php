<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Users\UserService;

class UserController extends Controller {
    public function index(Request $request, UserService $service) {
        $response = $service->getData($request);
        if ($response) {
            return $response;
        }
        return view("backend.user.index");
    }
}
