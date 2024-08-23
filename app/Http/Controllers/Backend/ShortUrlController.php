<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ShortUrl\ShortUrlService;

class ShortUrlController extends Controller {
    public function index(Request $request, ShortUrlService $service) {
        $response = $service->getData($request);
        if ($response) {
            return $response;
        }
        return view("backend.url.index");
    }
}
