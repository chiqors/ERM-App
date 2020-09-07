<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [[
            'full_name' => 'Irawan Gunadi',
            'email' => 'irawan@gmail.com',
            'password' => Hash::make('irawan'),
            'addition_information' => 'HRD',
            'position' => 'Human Resource Development',
            'status' => 'Aktif',
            'join_date' => '2020-08-28 00:00:00',
            'end_date' => null,
            'contract_duration' => null
        ], [
            'full_name' => 'Asep Atlas',
            'email' => 'atlas221@gmail.com',
            'password' => Hash::make('atlas'),
            'addition_information' => 'Programer',
            'position' => 'Programer',
            'status' => 'Aktif',
            'join_date' => '2019-05-18 00:00:00',
            'end_date' => null,
            'contract_duration' => null
        ], [
            'full_name' => 'Ahmad Alex',
            'email' => 'alex089@gmail.com',
            'password' => Hash::make('alex'),
            'addition_information' => 'CFO',
            'position' => 'Chief Financial Officer',
            'status' => 'Aktif',
            'join_date' => '2020-02-22 00:00:00',
            'end_date' => null,
            'contract_duration' => null
        ], [
            'full_name' => 'Yudhistira',
            'email' => 'yudhi11@gmail.com',
            'password' => Hash::make('yudhi'),
            'addition_information' => 'CMO',
            'position' => 'Chief Marketing Officer',
            'status' => 'Aktif',
            'join_date' => '2020-01-15 00:00:00',
            'end_date' => null,
            'contract_duration' => null
        ], [
            'full_name' => 'Ega Kusuma Syaputra',
            'email' => 'egaks@gmail.com',
            'password' => Hash::make('egaks'),
            'addition_information' => 'COO',
            'position' => 'Chief Operating Officer',
            'status' => 'Aktif',
            'join_date' => '2020-02-11 00:00:00',
            'end_date' => null,
            'contract_duration' => null
        ]];
        Employee::insert($employee);
    }
}
