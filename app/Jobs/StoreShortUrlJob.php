<?php

namespace App\Jobs;

use App\Models\ShortUrl;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreShortUrlJob implements ShouldQueue {
    use Queueable;

    public $shortUrl;
    /**
     * Create a new job instance.
     */
    public function __construct($shortUrl) {
        $this->shortUrl = $shortUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        ShortUrl::Create($this->shortUrl);
    }
}
