<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStuffRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "email|required",
            "password" => "string|required",
            "first_name" => "string|required",
            "second_name" => "string|required",
            "last_name" => "string|required",
            "role" => "string|required",
            "is_active" => "accepted|required",
        ];
    }
}
