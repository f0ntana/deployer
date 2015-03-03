<?php namespace App\Services\Db\Actions;

use Validator;

class ActionService
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
            'order' => 'required|integer',
            'type' => 'required|max:1',
        ]);
    }

}
