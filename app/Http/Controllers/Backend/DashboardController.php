<?php

namespace App\Http\Controllers\Backend;

use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrl\StoreShortUrlRequest;
use App\Http\Services\ShortUrl\StoreShortUrlService;

class DashboardController extends Controller {

    use ResponseTrait;

    public function index() {
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
