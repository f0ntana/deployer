<?php

use App\Models\Action;
use Illuminate\Database\Seeder;

class ActionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('actions')->delete();

        Action::create([
            'action_id' => null,
            'action' => 'system',
            'name' => 'Sistema',
            'slug' => 'sistema',
            'order' => 99,
            'type' => 'M',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('sistema')->first()->id,
            'action' => 'system.roles.index',
            'name' => 'Perfis',
            'slug' => 'perfis',
            'order' => 1,
            'type' => 'M',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('sistema')->first()->id,
            'action' => 'system.actions.index',
            'name' => 'Ações',
            'slug' => 'acoes',
            'order' => 2,
            'type' => 'M',
        ]);
    }

}
