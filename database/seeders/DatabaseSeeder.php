<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new User;
        $superAdmin->name = "Super Admin";
        $superAdmin->email = "admin@gmail.com";
        $superAdmin->password = Hash::make('admin@123');
        $superAdmin->role = true;
        $superAdmin->save();

        $front = new User;
        $front->name = "John";
        $front->email = "john@gmail.com";
        $front->password = Hash::make('john@123');
        $front->role = 2;
        $front->save();
    }
}

?>