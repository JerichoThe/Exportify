<?php

namespace App\Console;

use App\Models\Ads;
use App\Console\Commands\DeleteExpiredData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function () {
        //     Ads::remove_ads();
        // })->everyMinute();
        // $schedule->call([Ads::class, 'remove_ads'])->everyMinute();
        $schedule->command('delete:removed_at')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
