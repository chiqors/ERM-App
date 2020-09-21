<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [[
            'full_name' 	=> 'Administrator',
            'email' 		=> 'admin@aniqma.com',
            'password' 		=> Hash::make('tomatsegar'),
            'addition_information' => 'Default Account For Access',
            'position' 		=> 'Admin',
            'status' 		=> 'Active',
            'join_date' 	=> '2020-08-28 00:00:00',
            'end_date' 		=> null,
            'contract_duration' => null
        ]];
        Employee::insert($employee);
    }
}
