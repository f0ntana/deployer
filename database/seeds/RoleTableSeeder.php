<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
            'role_id' => null,
            'name' => 'Root',
            'slug' => 'root',
        ]);

        Role::create([
            'role_id' => Role::whereSlug('root')->first()->id,
            'name' => 'Administrador',
            'slug' => 'administrador',
        ]);
    }

}
