<?php

use Illuminate\Database\Seeder;
use App\Models\Host;
use Illuminate\Support\Facades\Hash;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Host::create([
            'name' => 'Host',
            'email' => 'vuvanhoang2@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 1,
        ]);
    }
}
