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
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'id' => 'required',
            'is_admin' => 'required',
            'is_operator' => 'sometimes',
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        $data['is_admin'] = $data['is_admin'] ?? '0';
        $data['is_operator'] = $data['is_operator'] ?? '0';

        return $data;
    }
}
