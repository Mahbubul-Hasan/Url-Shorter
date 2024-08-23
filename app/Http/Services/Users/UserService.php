<?php

namespace App\Http\Services\Users;

use App\Models\User;
use Yajra\DataTables\DataTables;

class UserService {

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
                ->addColumn('created_at', function ($user) {
                    return dateFormat1_1(@$user->created_at);
                })
                ->make(true);
        }
        return null;
    }
}
