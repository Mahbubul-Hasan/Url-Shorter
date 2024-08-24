<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Services\ShortUrl\ShortUrlService;
use App\Http\Services\Dashboard\DashboardService;
use App\Http\Requests\ShortUrl\StoreShortUrlRequest;

class DashboardController extends Controller {

    use ResponseTrait;

    public function __construct() {
        $this->middleware(['permission:Dashboard'])->only('index', 'urlShort');
    }

    public function index(Request $request, DashboardService $service) {
        $data = [];
        if ($request->ajax()) {
            return $service->getUserTableData();
        } else if (isAdmin()) {
            $data = $service->getAdminData();
        }
        return view("backend.dashboard.index", $data);
    }
    public function urlShort(StoreShortUrlRequest $request, ShortUrlService $service) {
        try {
            $service->saveRequest($request);
            $this->responseMessage('success', "Url Generated Successfully");
        } catch (\Throwable $th) {
            $this->responseMessage('error', $th->getMessage());
        }
        return back();
    }
}
