<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutConsumableRequest extends FormRequest
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
            "consumable_uuid" => "nullable|uuid",
        ];
    }
}
