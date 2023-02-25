<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Enable these options if you need same role and other permission for User Model
         * Else, please follow the below steps for admin guard
         */

        // Create Roles and Permissions
        $roleSuperAdmin = Role::create(['name' => 'Superadmin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleEditor = Role::create(['name' => 'Editor']);
        $roleUser = Role::create(['name' => 'User']);


        // Permission List as array
        $permissions = [

            [
                'group_id' => '1',
                'group_name' => 'Management',
                'permissions' => [
                    // management Permissions
                    'User Management',
                    'Employee Management',
                    'Company Management',
                    'HR Basic Setup',
                    'Job Scheduler',
                    'Attendance Management',
                    'Leave Management',
                    'Vacation Management',
                    'Deduction Management',
                    'Allowance Management',
                    'Asset Management',
                    'App Registration Management',
                    'Project Registration Management',
                    'Service Management',
                    'Job History',
                    'Complain Management',
                    'Provident Fund',
                    'Loan Management',
                    'Training Management',
                    'Trainer Management',
                    'Expense Management',
                    'Report Management',
                    'Meeting Management',
                    'Payment Management',
                    'Bank Cheque Management',
                    'Due Management',
                    'Notification Management',
                    'Recruitment Management',
                    'Shareholder',
                    'Payroll Management',
                ]
            ],
            [
                'group_id' => '2',
                'group_name' => 'Role',
                'permissions' => [
                    // role Permissions
                    'Create Role',
                    'View Roles',
                    'Edit Roles',
                    'Delete Roles',
                ]
            ],
            [
                'group_id' => '3',
                'group_name' => 'Group',
                'permissions' => [
                    // group Permissions
                    'Create Groups',
                    'Edit Groups',
                    'Delete Groups',
                ]
            ],
            [
                'group_id' => '4',
                'group_name' => 'Permission',
                'permissions' => [
                    // permission Permissions
                    'View Permissions',
                    'Create Permissions',
                    'Edit Permissions',
                    'Delete Permissions',
                ]
            ],
            [
                'group_id' => '5',
                'group_name' => 'User',
                'permissions' => [
                    // user Permissions
                    'View Users',
                    'Create Users',
                    'Edit Users',
                    'Delete Users',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroupId = $permissions[$i]['group_id'];
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_id' => $permissionGroupId, 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }

        $user = User::where('user_name', 'NasrinKona1')->first();
        $user->assignRole($roleSuperAdmin);
    }
}
