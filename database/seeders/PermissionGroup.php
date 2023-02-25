<?php

namespace Database\Seeders;

use App\Models\PermissionGroup as ModelsPermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsPermissionGroup::create(['id' => '1', 'name' => 'Management', 'order_no' => '1']);
        ModelsPermissionGroup::create(['id' => '2', 'name' => 'Role', 'order_no' => '2']);
        ModelsPermissionGroup::create(['id' => '3', 'name' => 'Group', 'order_no' => '3']);
        ModelsPermissionGroup::create(['id' => '4', 'name' => 'Permission', 'order_no' => '4']);
        ModelsPermissionGroup::create(['id' => '5', 'name' => 'User', 'order_no' => '5']);
    }
}
