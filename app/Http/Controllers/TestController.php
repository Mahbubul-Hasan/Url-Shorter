<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Http\Controllers\Controller;

class TestController extends Controller {
    public function index() {
        return ShortUrl::withTrashed()->where('expired_at', '<', now())->delete();
    }
}
