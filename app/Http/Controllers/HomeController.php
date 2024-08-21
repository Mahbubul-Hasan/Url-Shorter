<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function redirectUrl(ShortUrl $shortUrl) {
        if ($shortUrl->expire_at > now()) {
            return redirect()->to(url($shortUrl->original_url));
        }
        return abort(404);
    }
}
