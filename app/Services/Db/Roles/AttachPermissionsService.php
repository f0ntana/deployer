<?php namespace App\Services\Db\Roles;

use App\Models\Role;
use Exception;

class AttachPermissionsService extends RoleService
{

    public function execute(Role $Role, array $permissions = [])
    {
        try {
            $Role->permissions()->detach();

            if (is_array($permissions) && count($permissions)) {
                foreach ($permissions as $permission) {
                    $Role->permissions()->attach($permission);
                }
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
