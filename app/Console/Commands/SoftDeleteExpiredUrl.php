<?php

namespace App\Console\Commands;

use App\Models\ShortUrl;
use Illuminate\Console\Command;

class SoftDeleteExpiredUrl extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:soft-delete-expired-url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft delete expired url every 6 hours';

    /**
     * Execute the console command.
     */
    public function handle() {
        ShortUrl::where('expired_at', '<', now())->delete();
    }
}
