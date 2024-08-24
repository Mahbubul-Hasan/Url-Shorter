<?php

namespace App\Http\Services\Users;

use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Http\Traits\ResponseTrait;

class UserService {
    use ResponseTrait;

    public function getData($request) {
        if ($request->ajax()) {
            $users = User::query();
            $users->withCount('urlsWithTrashed');

            return DataTables::of($users)->escapeColumns([])
                ->addColumn('serial_number', function ($row) {
                    return '';
                })
                ->editColumn('serial_number', function ($row) {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('role', function ($user) {
                    return @$user?->getRoleNames()[0];
                })
                ->editColumn('created_at', function ($user) {
                    return dateFormat1_1(@$user->created_at);
                })
                ->make(true);
        }
        return null;
    }

    public function saveRequest($request) {
        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $user->assignRole($request->role);
            return $this->responseMessage('success', 'User created successfully');
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
}
