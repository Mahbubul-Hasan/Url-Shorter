<?php

namespace App\Http\Controllers\Backend;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Settings\SettingsService;
use App\Http\Requests\Settings\UpdateSettingsRequest;

class SettingsController extends Controller {

    public function __construct() {
        $this->middleware(['permission:Show settings'])->only('index');
        $this->middleware(['permission:Edit category'])->only('update');
    }

    public function index(Request $request) {
        $settings = Settings::find(1);
        return view("backend.settings.index", compact('settings'));
    }

    public function update(Settings $settings, UpdateSettingsRequest $request, SettingsService $service) {
        $service->saveRequest($settings, $request);
        return back();
    }
}
