<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if(request()->isMethod('post')) {
            return [
                'service' => 'required|string|max:258',
                'password' => 'required|string|max:256'
            ];
        } else {
            return [
                'service' => 'required|string|max:258',
                'password' => 'required|string|max:256'
            ];
        }
    }

    public function messages()
    {
        return [
            'service.required' => 'Service is required!',
            'password.required' => 'Password is required!'
        ];
        // if(request()->isMethod('post')) {
        //     return [
        //         'name.required' => 'Name is required!',
        //         'image.required' => 'Image is required!',
        //         'description.required' => 'Descritpion is required!'
        //     ];
        // } else {
        //     return [
        //         'name.required' => 'Name is required!',
        //         'description.required' => 'Descritpion is required!'
        //     ];   
        // }
    }
}
