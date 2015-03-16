<?php namespace App\Http\Requests\Config\Profile;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email'
        ];
    }

    public function authorize()
    {
        return true;
    }

}
