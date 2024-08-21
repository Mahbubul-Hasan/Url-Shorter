<?php

use Illuminate\Support\Str;

function dateFormat1($date) {
    return date('d M Y', strtotime($date));
}
function dateFormat1_1($date) {
    return date('d M Y h:i A', strtotime($date));
}

function makeSlug($sting) {
    return Str::slug($sting, '-');
}
