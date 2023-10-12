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
            'name' => 'required',
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'id' => 'required',
            'is_admin' => 'nullable|sometimes',
            'active' => 'nullable|sometimes',
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        $data['is_admin'] = $data['is_admin'] ?? '0';
        $data['active'] = $data['active'] ?? '0';
        $data['password'] = bcrypt($data['password']);

        return $data;
    }
}
