<?php namespace App\Services\Db\Deploys;

use Validator;

class DeployService
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
            'branch' => 'required|max:255',
        ]);
    }

}
