<?php

namespace App\Http\Services\ShortUrl;

use App\Models\ShortUrl;
use App\Jobs\StoreShortUrlJob;
use Illuminate\Support\Facades\Auth;

class StoreShortUrlService {
    public function saveRequest($request) {

        $shortUrl = [
            'user_id'      => Auth::id(),
            'original_url' => $request->original_url,
            'url_code'     => $this->generateUniqueShortCode($request->url_code),
            'expire'       => $request->expire ?? 48,
            'expired_at'   => $this->expireAtDate($request->expire),
        ];

        session()->flash('url', asset($shortUrl['url_code']));

        dispatch(new StoreShortUrlJob($shortUrl));

        return $shortUrl;
    }

    private function generateUniqueShortCode($code) {
        if ($code) {
            $shortCode = $code;
        } else {
            do {
                $shortCode = makeRandomString(6);
            } while (ShortUrl::where('url_code', $shortCode)->exists());
        }

        return $shortCode;
    }
    private function expireAtDate($expire) {
        $hours = $expire ?? 48;
        return now()->addHours((int) $hours);
    }
}
