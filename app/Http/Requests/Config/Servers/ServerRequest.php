<?php namespace App\Http\Requests\Config\Servers;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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
