<?php

namespace App\Http\Services\Dashboard;

use App\Models\ShortUrl;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class DashboardService {
    public function getData($request) {
        if ($request->ajax()) {
            $shortUrls = ShortUrl::query();
            $shortUrls->withTrashed()->where('user_id', Auth::id())->latest()->select('short_urls.*');

            return DataTables::of($shortUrls)->escapeColumns([])
                ->addColumn('serial_number', function ($row) {
                    return '';
                })
                ->editColumn('serial_number', function ($row) {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('expired_at', function ($shortUrl) {
                    return dateFormat1_1(@$shortUrl->expired_at);
                })
                ->addColumn('created_at', function ($shortUrl) {
                    return dateFormat1_1(@$shortUrl->created_at);
                })
                ->make(true);
        }
        return null;
    }
}
