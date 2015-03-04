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
            'action_id' => Action::whereSlug('perfis')->first()->id,
            'action' => 'system.roles.create',
            'name' => 'Adicionar',
            'slug' => 'adicionar',
            'order' => 1,
            'type' => 'A',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('perfis')->first()->id,
            'action' => 'system.roles.edit',
            'name' => 'Editar',
            'slug' => 'editar',
            'order' => 2,
            'type' => 'A',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('perfis')->first()->id,
            'action' => 'system.roles.destroy',
            'name' => 'Remover',
            'slug' => 'remover',
            'order' => 2,
            'type' => 'A',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('sistema')->first()->id,
            'action' => 'system.actions.index',
            'name' => 'Ações',
            'slug' => 'acoes',
            'order' => 2,
            'type' => 'M',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('acoes')->first()->id,
            'action' => 'system.actions.create',
            'name' => 'Adicionar',
            'slug' => 'adicionar',
            'order' => 1,
            'type' => 'A',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('acoes')->first()->id,
            'action' => 'system.actions.edit',
            'name' => 'Editar',
            'slug' => 'editar',
            'order' => 2,
            'type' => 'A',
        ]);

        Action::create([
            'action_id' => Action::whereSlug('acoes')->first()->id,
            'action' => 'system.actions.destroy',
            'name' => 'Remover',
            'slug' => 'remover',
            'order' => 2,
            'type' => 'A',
        ]);
    }

}
