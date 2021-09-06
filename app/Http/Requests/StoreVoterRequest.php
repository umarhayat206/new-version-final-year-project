<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoterRequest extends FormRequest
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
       
        return [
            //
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            // 'password'=>'required|string|min:8',
            'cnic'=>'required|unique:users',
            'image'=>'required',
            'contact'=>'required',
            'nationalArea'=>'required',
            'provinceArea'=>'required',
            'address'=>'required',


        ];
    }
}
