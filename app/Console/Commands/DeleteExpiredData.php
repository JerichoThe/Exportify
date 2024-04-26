<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DeleteExpiredData extends Command
{
    protected $signature = 'delete:removed_at';
    protected $description = 'Delete expired data from the ads table';

    public function handle()
    {
        DB::table('ads')
            ->where('removed_at', '<', now())
            ->update(['deleted_at' => Carbon::now()]);
    }
}