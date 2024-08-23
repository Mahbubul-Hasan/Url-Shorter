<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model {
    use HasFactory;

    protected $guarded = [];

    protected $appends = ["faviconLink"];

    public function getFaviconLinkAttribute() {
        return $this->favicon ? asset('/storage/images/settings/' . $this->favicon) : null;
    }
}
