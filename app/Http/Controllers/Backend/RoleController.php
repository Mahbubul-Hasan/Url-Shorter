<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Services\Role\RoleService;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

class RoleController extends Controller {

    public function __construct() {
        $this->middleware(['permission:Role list'])->only('index', 'show');
        $this->middleware(['permission:Create role'])->only('create', 'store');
        $this->middleware(['permission:Edit role'])->only('edit', 'update', 'destroy');
    }

    public function index(Request $request, RoleService $service) {
        $response = $service->getData($request);
        if ($response) {
            return $response;
        }
        return view('backend.role.index');
    }

    public function create() {
        $permissions = Permission::all()->groupBy('group_name');
        return view('backend.role.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request, RoleService $service) {
        $service->storeData($request);
        return back();
    }

    public function edit(Role $role) {
        $data = [
            'role'        => $role,
            'permissions' => Permission::all()->groupBy('group_name'),
        ];
        return view('backend.role.edit', $data);
    }

    public function update(Role $role, UpdateRoleRequest $request, RoleService $service) {
        $service->updateData($role, $request);
        return back();
    }
}
