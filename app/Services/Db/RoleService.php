<?php namespace App\Services\Db;

use App\Models\Role;
use Validator;

class RoleService
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);
    }

    /**
     * Create a new role instance after a valid registration.
     *
     * @param  array $data
     * @param null $id
     * @return User
     */
    public function save(array $data, $id = null)
    {
        if ($id) {
            $Role = Role::find($id);
        } else {
            $Role = new Role();
        }

        $Role->name = $data['name'];

        if (array_key_exists('role_id', $data)) {
            $Role->role_id = $data['role_id'];
        }

        return $Role->save();
    }

    public function remove($id)
    {
        $Role = Role::find($id);

        if ($Role->delete()) {
            return true;
        }

        return false;
    }

}
