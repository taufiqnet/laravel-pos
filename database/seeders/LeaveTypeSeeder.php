<?php

namespace Database\Seeders;

use App\Models\leave\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::firstOrCreate(
            ['leave_type' => 'CL'],
            [
                'description' => 'Casual Leave',
                'max_day' => 10,
                'status' => 1,
            ]
        );

        LeaveType::firstOrCreate(
            ['leave_type' => 'SL'],
            [
                'description' => 'Sick Leave',
                'max_day' => 10,
                'status' => 1,
            ]
        );

        LeaveType::firstOrCreate(
            ['leave_type' => 'AL'],
            [
                'description' => 'Annual Leave',
                'max_day' => 10,
                'status' => 1,
            ]
        );

        LeaveType::firstOrCreate(
            ['leave_type' => 'EL'],
            [
                'description' => 'Earned Leave',
                'max_day' => 18,
                'status' => 1,
            ]
        );

        LeaveType::firstOrCreate(
            ['leave_type' => 'ML'],
            [
                'description' => 'Maternity Leave',
                'max_day' => 90,
                'status' => 1,
            ]
        );

    }
}
