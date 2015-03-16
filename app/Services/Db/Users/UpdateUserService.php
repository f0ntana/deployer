<?php namespace App\Services\Db\Users;

use App\Models\User;
use Validator;

class UpdateUserService extends UserService
{

    public function execute(array $data, $id)
    {
        $User = User::find($id);

        if ($data['name']) {
            $User->name = $data['name'];
        }

        if ($data['email']) {
            $User->email = $data['email'];
        }

        if ($data['password']) {
            $User->password = bcrypt($data['password']);
        }

        if ($data['picture']) {
            $User->picture = $data['picture'];
        }

        return $User->save();
    }

}
