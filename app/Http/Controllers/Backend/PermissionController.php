<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Services\Permission\PermissionService;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;

class PermissionController extends Controller {

    use ResponseTrait;

    public function __construct() {
        $this->middleware(['permission:Permission list'])->only('index');
        $this->middleware(['permission:Create permission'])->only('create', 'store');
        $this->middleware(['permission:Edit permission'])->only('edit', 'update');
    }

    public function index(Request $request, PermissionService $service) {
        $response = $service->getData($request);
        if ($response) {
            return $response;
        }
        return view('backend.permission.index');
    }

    public function create() {
        return view('backend.permission.create');
    }

    public function store(StorePermissionRequest $request, PermissionService $service) {
        $service->storeData($request);
        return back();
    }

    public function edit(Permission $permission) {
        return view('backend.permission.edit', compact('permission'));
    }

    public function update(Permission $permission, UpdatePermissionRequest $request, PermissionService $service) {
        $service->updateData($permission, $request);
        return back();
    }
}
