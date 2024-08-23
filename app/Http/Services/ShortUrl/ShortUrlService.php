<?php

namespace App\Http\Services\ShortUrl;

use App\Models\ShortUrl;
use App\Jobs\StoreShortUrlJob;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ShortUrlService {

    public function getData($request) {
        if ($request->ajax()) {
            $shortUrls = ShortUrl::query();
            $shortUrls->withTrashed()->with('user')->latest()->select('short_urls.*');

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

    public function getDataBySpecifiedUser($request) {
        return ShortUrl::withTrashed()->where('user_id', $request->user_id)->latest()->get();
    }

    public function saveRequest($request) {
        $shortUrl = [
            'user_id'      => Auth::id(),
            'original_url' => $request->original_url,
            'url_code'     => $this->generateUniqueShortCode($request->url_code),
            'expire'       => $request->expire ?? 48,
            'expired_at'   => $this->expireAtDate($request->expire),
        ];

        session()->flash('shortUrl', asset($shortUrl['url_code']));

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
