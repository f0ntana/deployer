<?php namespace App\Services\Db\Roles;

use App\Models\Role;
use Validator;

class CreateRoleService extends RoleService
{

    public function execute(array $data)
    {
        return Role::create([
            'role_id' => $data['role_id'],
            'name' => $data['name'],
        ]);
    }

}
