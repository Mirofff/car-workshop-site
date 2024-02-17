<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStatement extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "vehicle_uuid" => "required|uuid",
            "user_uuid" => "required|uuid",
        ];
    }
}
