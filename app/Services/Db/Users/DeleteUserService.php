<?php namespace App\Services\Db\Users;

use App\Models\User;
use Validator;

class DeleteUserService extends UserService
{

    public function execute($id)
    {
        $User = User::find($id);

        if ($User->delete()) {
            return true;
        }

        return false;
    }

}
