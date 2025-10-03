<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetDailyVisits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visits:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset daily_visits column for all users, vidoes, news at midnight and truncate the daily_visits table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('daily_visits')->truncate();
        DB::table('music')->update(['daily_visits'=>0]);
        DB::table('vidoes')->update(['daily_visits'=>0]);
        DB::table('news')->update(['daily_visits'=>0]);
      
        $this->info('All music , videos, news \' daily visits have been reset to 0.');
    }
}
