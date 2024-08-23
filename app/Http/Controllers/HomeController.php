<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Services\ShortUrl\ShortUrlService;
use App\Http\Requests\ShortUrl\StoreShortUrlRequest;

class HomeController extends Controller {
    use ResponseTrait;

    public function landingPage() {
        return view("home");
    }
    public function index() {
        return redirect(route('backend.dashboard'));
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

    public function redirectUrl(ShortUrl $shortUrl) {
        if ($shortUrl->expired_at > now()) {
            return redirect()->to(url($shortUrl->original_url));
        }
        return abort(404);
    }
}
