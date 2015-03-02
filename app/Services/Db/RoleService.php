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
     * @return Role
     */
    public function create(array $data)
    {
        $Role = new Role;
        $Role->role_id = $data['role_id'];
        $Role->name = $data['name'];

        if ($Role->save()) {
            return $Role;
        }

        return false;
    }

    /**
     * Update a role instance after a valid registration.
     *
     * @param  array $data
     * @return Role
     */
    public function update(array $data, $id)
    {
        $Role = Role::find($id);
        $Role->role_id = $data['role_id'];
        $Role->name = $data['name'];

        if ($Role->save()) {
            return $Role;
        }

        return false;
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
