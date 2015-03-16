<?php namespace App\Services\Db\Users;

use App\Models\User;
use Validator;

class CreateUserService extends UserService
{

    public function execute(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'picture' => $data['picture'],
        ]);
    }

}
