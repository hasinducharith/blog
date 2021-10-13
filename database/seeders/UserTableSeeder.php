<?php

namespace Database\Seeders;

use App\Enums\User\UserRoles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder{

    public function run(){


        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'email_verified_at' =>  now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
            'remember_token' => null,
            'role' => UserRoles::user
        ]);
        


        $admins = [
            [
                'name' => 'Dilan Kumara',
                'email' => 'dilankumara@yahoo.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
                'role' => UserRoles::admin,
            ],
        ];

        
        foreach ($admins as $admin) {
            User::create($admin);
        }

    }
}