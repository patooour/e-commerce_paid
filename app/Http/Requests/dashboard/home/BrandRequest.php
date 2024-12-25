<?php

namespace App\Http\Requests\dashboard\home;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $rules = [
            'name.*'=>'required|string|min:3|max:70|'.UniqueTranslationRule::for('brands')->ignore($this->id),

            'status'=>'nullable|in:on,off,0,1',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['logo'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3000';
        }else{
            $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000';
        }
        return  $rules;
    }
}
