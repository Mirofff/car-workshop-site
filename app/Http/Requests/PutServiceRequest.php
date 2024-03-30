<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "price" => "required|numeric",
            "service_uuid" => "nullable|uuid",
        ];
    }
}
