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
            "request_uuid" => "required|uuid",
            "vehicle_uuid" => "required|uuid",
            "client_uuid" => "required|uuid",
        ];
    }
}
