<?php

namespace App\Http\Requests;

use App\Rules\UppercaseRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=>['required','string',new UppercaseRule()],
            'last_name'=>['required'],
            'email'=>['required'],
            'street_address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            // 'zip'=>['required'],
        ];
    }
    public function messages()
    {
        return [ 'first_name.required'=>'This field is required'];
    }
}
