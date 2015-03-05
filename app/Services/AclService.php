<?php namespace App\Services;

use App\Models\Action;
use App\Models\Role;
use Auth;

class AclService
{

    public static function hasPermissionById($id, Role $Role = null)
    {
        if ($Role) {
            return self::has($Role, Action::find($id)->action);
        } else {
            return self::hasPermission(Action::find($id)->action);
        }
    }

    public static function has(Role $Role, $action)
    {
        if ($Role->slug == 'root') {
            return true;
        } else {
            if ($Role->permissions->count()) {
                foreach ($Role->permissions as $permission) {
                    if ($permission->action == $action) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    public static function hasPermission($action)
    {
        return self::has(Auth::user()->role, $action);
    }

}
