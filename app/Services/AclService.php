<?php namespace App\Services;

use App\Models\Action;
use Auth;

class AclService
{

    public static function hasPermissionById($id)
    {
        return self::hasPermission(Action::find($id)->action);
    }

    public static function hasPermission($action)
    {
        $User = Auth::user();

        if ($User->role->slug == 'root') {
            return true;
        } else {
            if ($User->role->permissions->count()) {
                foreach ($User->role->permissions as $permission) {
                    if ($permission->action == $action) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

}
