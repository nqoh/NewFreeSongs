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
    protected $description = 'Reset today_visits column for all users, vidoes, news  at midnight';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('music')->update(['today_visits'=>0]);
        // DB::table('vidoes')->update(['today_visits'=>0]);
        // DB::table('news')->update(['today_visits'=>0]);

        $this->info('All music , videos, news \' today visits have been reset to 0.');
    }
}
