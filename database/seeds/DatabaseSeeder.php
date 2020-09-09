<?php

use App\ActivityLogs;
use App\EmployeeEvent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeeSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EmployeeEventSeeder::class);
        $this->call(ActivityLogsSeeder::class);
    }
}
