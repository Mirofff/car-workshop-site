<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PutUserStuff extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "email",
            "last_name" => "string",
            "first_name" => "string",
            "second_name" => "string",
            "is_active" => "in:on,off",
            "role" => "in:admin,operator,client",
        ];
    }
}
