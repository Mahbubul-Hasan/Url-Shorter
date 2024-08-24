<?php

namespace App\Http\Services\Role;

use Yajra\DataTables\DataTables;
use App\Http\Traits\ResponseTrait;
use Spatie\Permission\Models\Role;

class RoleService {
    use ResponseTrait;

    public function getData($request) {
        if ($request->ajax()) {
            $roles = Role::query();
            $roles->with('permissions')->select('roles.*');

            return DataTables::of($roles)->escapeColumns([])
                ->addColumn('serial_number', function ($row) {
                    return '';
                })
                ->editColumn('serial_number', function ($row) {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('permissions', function ($role) {
                    $permissions = '<div class="d-flex flex-wrap">';
                    foreach ($role->permissions as $index => $permission) {
                        $permissions .= '<span class="badge text-bg-secondary m-1 p-1">' . $permission->name . '</span>';
                    }
                    return $permissions .= '</div>';
                })
                ->addColumn('action', function ($role) {
                    return [
                        'edit' => route('backend.roles.edit', $role->id),
                    ];
                })
                ->make(true);
        }

        return null;
    }
    public function storeData($request) {
        try {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            return $this->responseMessage('success', 'Role created successfully');
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
    public function updateData($role, $request) {
        try {
            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permissions);

            return $this->responseMessage('success', 'Role updated successfully');
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
}
