<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = [[
            'event_name' 	=> 'Pernikahan Aki',
            'event_start' 	=> '2020-09-07 00:00:00',
            'event_end' 	=> '2020-09-07 00:01:00',
            'event_details' 	=> 'Pernikahan',
            'event_type' 	=> 'One Time'
        ], [
            'event_name' 	=> 'Pindahan Rumah',
            'event_start' 	=> '2020-09-12 00:00:00',
            'event_end' 	=> '2020-09-15 00:01:00',
            'event_details' 	=> 'Pindahan',
            'event_type' 	=> 'One Time'
        ], [
            'event_name' 	=> 'Umroh',
            'event_start' 	=> '2020-09-16 00:00:00',
            'event_end' 	=> '2020-09-30 00:01:00',
            'event_details' 	=> 'Umroh',
            'event_type' 	=> 'One Time'
        ], [
            'event_name' 	=> 'Cuti',
            'event_start' 	=> '2020-09-07 00:00:00',
            'event_end' 	=> '2020-09-07 00:01:00',
            'event_details' 	=> 'Cuti Bulanan',
            'event_type' 	=> 'Recurring Monthly'
        ], [
            'event_name' 	=> 'Cuti',
            'event_start' 	=> '2020-09-07 00:00:00',
            'event_end' 	=> '2020-09-07 00:01:00',
            'event_details' 	=> 'Lahiran Istri',
            'event_type' 	=> 'One Time'
        ], [
            'event_name' 	=> 'Cuti',
            'event_start' 	=> '2020-09-07 00:00:00',
            'event_end' 	=> '2020-09-07 00:01:00',
            'event_details' 	=> 'Sakit',
            'event_type' 	=> 'One Time'
        ], [
            'event_name' 	=> 'Meeting',
            'event_start' 	=> '2020-09-09 00:00:00',
            'event_end' 	=> '2020-09-09 00:01:00',
            'event_details'	=> 'Meeting',
            'event_type' 	=> 'Recurring Monthly'
        ], [
            'event_name' 	=> 'Meeting',
            'event_start' 	=> '2020-09-09 00:00:00',
            'event_end' 	=> '2020-09-09 00:01:00',
            'event_details' 	=> 'Meeting',
            'event_type' 	=> 'Recurring Monthly'
        ], [
            'event_name' 	=> 'Meeting',
            'event_start' 	=> '2020-09-09 00:00:00',
            'event_end' 	=> '2020-09-09 00:01:00',
            'event_details' 	=> 'Meeting',
            'event_type' 	=> 'Recurring Monthly'
        ], [
            'event_name' 	=> 'Meeting',
            'event_start' 	=> '2020-09-09 00:00:00',
            'event_end' 	=> '2020-09-09 00:01:00',
            'event_details' 	=> 'Meeting',
            'event_type' 	=> 'Recurring Monthly'
        ]];
        Event::insert($event);
    }
}
