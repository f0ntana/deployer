<?php namespace App\Http\Requests\System\Actions;

use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'order' => 'required|integer',
            'type' => 'required|max:1',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
