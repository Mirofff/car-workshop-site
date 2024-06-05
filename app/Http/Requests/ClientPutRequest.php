<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientPutRequest extends FormRequest
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
            "first_name" => "string|nullable",
            "second_name" => "string|nullable",
            "last_name" => "string|nullable",
            "email" => "email|nullable",
            "password" => "string|nullable",
        ];
    }
}
