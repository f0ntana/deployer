<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'role_id' => Role::whereSlug('root')->first()->id,
            'name' => 'Root',
            'email' => 'root@deployer.com.br',
            'password' => bcrypt('123456'),
            'picture' => 'admin.jpg',
        ]);

        User::create([
            'role_id' => Role::whereSlug('administrador')->first()->id,
            'name' => 'Administrador',
            'email' => 'admin@deployer.com.br',
            'password' => bcrypt('123456'),
            'picture' => 'admin.jpg',
        ]);
    }

}