<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'event_name' => 'Pernikahan Aki',
            'date' => '2020-09-07 00:00:00',
            'detail_event' => 'Pernikahan',
            'event_duration' => null,
            'event_type' => 'One Time'
        ]);
    }
}
