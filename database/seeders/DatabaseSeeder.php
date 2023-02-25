<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\branch\Branch;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PermissionGroup::class);
        $this->call(RolePermissionSeeder::class);

        //company seed
        $this->call([CompanySeeder::class]);

        // branch seed
        // $this->call([BranchSeeder::class]);

    }
}
