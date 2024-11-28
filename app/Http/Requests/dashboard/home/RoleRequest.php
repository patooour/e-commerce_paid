<?php

namespace App\Http\Requests\dashboard\home;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role.*'=>['required','string','max:100' ,
                UniqueTranslationRule::for('roles')->ignore($this->id) ],
            'permissions'=>'required|array|min:1',
        ];
    }
}
