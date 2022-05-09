<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                         'name'=> 'Admin',
                         'user_role_id'=> 1,
                         'email'=> 'admin@admin.com',
                         'dob'=>1990,
                         'image'=>  "https://www.dallalii.com/img/admin/logo.png",
                         'password'=> Hash::make('admin123456')
                     ]);

    }
}
