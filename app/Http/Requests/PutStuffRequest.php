<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutStuffRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id" => "int|required",
            "email" => "email|nullable",
            "password" => "string|nullable",
            "first_name" => "string|nullable",
            "second_name" => "string|nullable",
            "last_name" => "string|nullable",
            "role" => "string|nullable",
            "is_active" => "accepted|nullable",
        ];
    }
}
