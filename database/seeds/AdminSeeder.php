<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'vuvanhoang@gmail.com',
            'password' =>  Hash::make('123456'),
            'status' => 1,
        ]);
        $admin->assignRole('Quản trị viên');
    }
}
