<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Mirko',
                'lastname' => 'Dinamarca',
                'username' => 'mdinamarca',
                'email' => 'mdinamarca@correo.com',
                'superadmin' => 0,
                'password' => Hash::make('12345678'),
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('users')->insert($users);
    }
}
