<?php namespace App\Http\Requests\Config\Environments;

use Illuminate\Foundation\Http\FormRequest;

class EnvironmentRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'folder' => 'required|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
