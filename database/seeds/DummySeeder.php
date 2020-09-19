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
            'full_name' 	=> 'Irawan Gunadi',
            'email' 		=> 'irawan@gmail.com',
            'password' 		=> Hash::make('irawan'),
            'addition_information' => 'HRD',
            'position' 		=> 'Human Resource Development',
            'status' 		=> 'Active',
            'join_date' 	=> '2020-08-28 00:00:00',
            'end_date' 		=> null,
            'contract_duration' => null
        ]];
        Employee::insert($employee);
    }
}
