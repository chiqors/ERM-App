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
            'event_start' => '2020-09-07 00:00:00',
            'event_end' => '2020-09-07 00:01:00',
            'event_details' => 'Pernikahan',
            'event_type' => 'One Time'
        ]);
    }
}
