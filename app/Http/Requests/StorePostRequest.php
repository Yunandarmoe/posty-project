<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StorePostRequest extends FormRequest
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
    
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required',
        ];
    }

    /** 
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'The email is required!',
            'name.required' => 'The name is required!',
            'username.required' => 'The username is required!',
            'password.required' => 'The password is required!',
            'image.required' => 'The image is required!',
        ];
    }    
}
