<?php

namespace App\Http\Requests\dashboard\home;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'name'=>'required|string|min:3|max:100',
            'email'=>'required|string|email|max:120|unique:admins,email,'.$this->id,

            'role_id'=>'required|integer|exists:roles,id',
            'status'=>'in:off,on,1,0',
        ];
        /* case of update in request */
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['password'] = 'nullable|string|min:8|max:100|confirmed';
        }else{
            $rules['password'] = 'required|string|min:8|max:100|confirmed';
        }
        return  $rules;
    }
}
