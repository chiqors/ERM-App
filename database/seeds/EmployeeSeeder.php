<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'full_name' => 'Irawan Gunadi',
            'email' => 'irawan@gmail.com',
            'password' => Hash::make('irawan'),
            'addition_information' => 'HRD',
            'position' => 'Human Resource Development',
            'status' => 'Aktif',
            'join_date' => '2020-08-28 00:00:00',
            'end_date' => null,
            'contract_duration' => null
        ]);
    }
}
