<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\ResetDailyVisits;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


return function(Schedule $schedule){
   $schedule->command('visits:reset')->everySecond();
};

Schedule::command('visits:reset')->everySecond();