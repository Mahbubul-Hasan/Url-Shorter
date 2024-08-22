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
        $response = $service->getData($request);
        if ($response) {
            return $response;
        }
        return view("backend.dashboard.index");
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
