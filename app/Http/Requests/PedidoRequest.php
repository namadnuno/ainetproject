<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|min:5|max:254',
            'open_date' => 'required|date',
            'quantity' => 'required|integer|min:1|max:1000',
            'colored' => 'required|boolean',
            'stapled' => 'required|boolean',
            'paper_size' => 'required|integer|min:1|max:6',
            'paper_type' => 'required|integer|min:1|max:3',
            'file' => 'required|file|max:10240|mimes:jpg,jpeg,bmp,png,tiff,doc,docx,xlsx,odt,pdf'
        ];
    }
}
