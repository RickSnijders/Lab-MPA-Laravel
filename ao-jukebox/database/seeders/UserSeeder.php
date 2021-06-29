<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Juan '.Str::random(6),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'remember_token'=> Str::random(10),

        ]);

    }
}
