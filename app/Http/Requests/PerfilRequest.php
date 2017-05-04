<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'name' => 'required|min:5',
                'email' => 'required|min:5|email',
                'password' => 'required|confirmed',
                'profile_photo' => 'image',
                'presentation' => 'max:254',
                'department_id' => 'required'
            ];
        }
        return [
            'name' => 'required|min:5',
            'email' => 'required|min:5|email',
            'password' => 'confirmed',
            'profile_photo' => 'image',
            'presentation' => 'max:254'
        ];
    }
}
