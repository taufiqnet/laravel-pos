<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'kamrul@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->emp_id = "";
            $user->user_name = "NasrinKona1";
            $user->full_name = "Nasrin Kona";
            $user->email = "nasrinkona2@gmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
            
        }
    }
}
