<?php

use Illuminate\Database\Seeder;
use App\Models\EmployeeEvent;

class EmployeeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employeeEvent = [[
            'employee_id' 	=> 1,
            'event_id' 		=> 2
        ], [
            'employee_id' 	=> 2,
            'event_id' 		=> 1
        ], [
            'employee_id' 	=> 3,
            'event_id' 		=> 4
        ], [
            'employee_id' 	=> 4,
            'event_id' 		=> 5
        ], [
            'employee_id' 	=> 5,
            'event_id' 		=> 3
        ], [
            'employee_id' 	=> 6,
            'event_id' 		=> 8
        ], [
            'employee_id' 	=> 7,
            'event_id' 		=> 6
        ], [
            'employee_id' 	=> 8,
            'event_id' 		=> 10
        ], [
            'employee_id' 	=> 9,
            'event_id' 		=> 7
        ], [
            'employee_id' 	=> 10,
            'event_id' 		=> 9
        ]];
        EmployeeEvent::insert($employeeEvent);
    }
}
