<?php namespace App\Http\Requests\Config\Projects;

use Illuminate\Foundation\Http\FormRequest;

class EnvironmentRequest extends FormRequest
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
