<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'new_password' => 'sometimes|nullable|min:6',
            'confirm_password' => 'sometimes|nullable|same:new_password',
            'avatar' => [Rule::requiredIf(request()->avatar), 'max:5120', 'mimes:jpg,png,jpeg'],
        ];
    }
}
