<?php

use Illuminate\Database\Seeder;
use App\ActivityLogs;

class ActivityLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activityLogs = [[
            'event_id' 		=> '1',
            'status'		 => 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '2',
            'status'		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '3',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '4',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '5',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '6',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '7',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '8',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '9',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ], [
            'event_id' 		=> '10',
            'status' 		=> 'Accepted',
            'time' 		=> '2020-09-10 00:00:00',
            'created_at' 	=> '2020-09-09 00:01:00',
            'updated_at' 	=> '2020-09-09 00:01:00'
        ]];
        ActivityLogs::insert($activityLogs);
    }
}
