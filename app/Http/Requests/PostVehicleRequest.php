<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostVehicleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "registration_plate" => "required|string",
            "model_id" => "required|integer",
            "client_id" => "required|int",
            "vin" => "required|string",
            "tech_passport" => "string|nullable",
            "mileage" => "required|integer",
            "color" => "required|string",
        ];
    }
}
