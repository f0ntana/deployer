<?php namespace App\Http\Requests\System\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
