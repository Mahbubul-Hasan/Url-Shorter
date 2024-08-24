<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Services\Users\UserService;
use App\Http\Requests\User\StoreUserRequest;

class UserController extends Controller {
    public function index(Request $request, UserService $service) {
        $response = $service->getData($request);
        if ($response) {
            return $response;
        }
        return view("backend.user.index");
    }

    public function create() {
        $roles = Role::get();
        return view('backend.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request, UserService $service) {
        $service->saveRequest($request);
        return back();
    }
}
