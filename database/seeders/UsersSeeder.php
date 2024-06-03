<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'lastname' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@correo.com',
                'superadmin' => 1,
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Mirko',
                'lastname' => 'Dinamarca',
                'username' => 'mdinamarca',
                'email' => 'mdinamarca@correo.com',
                'superadmin' => 0,
                'password' => Hash::make('123456'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
