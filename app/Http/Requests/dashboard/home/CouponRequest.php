<?php

namespace App\Http\Requests\dashboard\home;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
        return [
            'code'=>'required|min:5|max:20|unique:coupons,code,'.$this->id,
            'discount_percentage'=>'required|numeric|between:0,90',
            'limit'=>'required|numeric|between:0,1000',
            'start_at'=>'required|date|after_or_equal:today',
            'end_at'=>'required|date|after_or_equal:start_at',
            'note'=>'nullable|string|max:255',
            'is_active'=>'in:on,off,0,1',
        ];
    }
}
