<?php namespace App\Services\Db\Roles;

use App\Models\Role;
use Validator;

class UpdateRoleService extends RoleService
{

    public function execute(array $data, $id)
    {
        $Role = Role::find($id);
        $Role->role_id = $data['role_id'];
        $Role->name = $data['name'];

        return $Role->save();
    }

}
