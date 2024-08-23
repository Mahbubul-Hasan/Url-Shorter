<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\DashboardService;
use App\Http\Requests\ShortUrl\StoreShortUrlRequest;
use App\Http\Services\ShortUrl\StoreShortUrlService;

class DashboardController extends Controller {

    use ResponseTrait;

    public function index(Request $request, DashboardService $service) {
        $data = [];
        if ($request->ajax()) {
            return $service->getUserTableData();
        } else if (isAdmin()) {
            $data = $service->getAdminData();
        }
        return view("backend.dashboard.index", $data);
    }
    public function urlShort(StoreShortUrlRequest $request, StoreShortUrlService $service) {
        try {
            $service->saveRequest($request);
            $this->responseMessage('success', "Url Generated Successfully");
        } catch (\Throwable $th) {
            $this->responseMessage('error', $th->getMessage());
        }
        return back();
    }
}
