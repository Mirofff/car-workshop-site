<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditUserRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'first_name' => 'required|unique:users,first_name',
            'second_name' => 'required|unique:users,second_name',
            'last_name' => 'required|unique:users,last_name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'id' => 'required|uuid',
            // 'is_admin' => 'sometimes|accepted',
            // 'active' => 'sometimes|accepted',
        ];
    }
}
