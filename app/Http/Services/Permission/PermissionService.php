<?php

namespace App\Http\Services\Permission;

use Yajra\DataTables\DataTables;
use App\Http\Traits\ResponseTrait;
use Spatie\Permission\Models\Permission;

class PermissionService {
    use ResponseTrait;

    public function getData($request) {
        if ($request->ajax()) {
            $permissions = Permission::query();
            $permissions->select('permissions.*');

            return DataTables::of($permissions)->escapeColumns([])
                ->addColumn('serial_number', function ($row) {
                    return '';
                })
                ->editColumn('serial_number', function ($row) {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('action', function ($permission) {
                    return [
                        'edit'   => route('backend.permissions.edit', $permission->id),
                        'delete' => route('backend.permissions.destroy', $permission->id),
                    ];
                })
                ->make(true);
        }
        return null;
    }
    public function storeData($request) {
        try {
            Permission::create([
                'group_name' => $request->group_name,
                'name'       => $request->name,
            ]);
            return $this->responseMessage('success', 'Permission create successfully');
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
    public function updateData($permission, $request) {
        try {
            $permission->update([
                'group_name' => $request->group_name,
                'name'       => $request->name,
            ]);
            return $this->responseMessage('success', 'Permission update successfully');
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
}
