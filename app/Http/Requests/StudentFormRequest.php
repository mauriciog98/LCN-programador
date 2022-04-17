<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:50',
            'lastname'=>'required|max:50',
            'document_type'=>'required',
            'document_number'=>'required|max:50',
            'gender'=>'required',
            'birthdate'=>'required|date',
            'career'=>'required|max:50'
        ];
    }
}
