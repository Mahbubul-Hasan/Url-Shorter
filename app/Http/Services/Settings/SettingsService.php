<?php

namespace App\Http\Services\Settings;

use App\Http\Traits\ResponseTrait;
use App\Http\Traits\FileHandleTraits;

class SettingsService {
    use FileHandleTraits, ResponseTrait;
    public function saveRequest($settings, $request) {
        try {
            $settings->update([
                'site_name' => $request->site_name,
                'favicon'   => $this->updateFile($request, 'favicon', $settings->favicon, "images/settings"),
            ]);
            return $this->responseMessage('success', "Site settings updated");
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
}
