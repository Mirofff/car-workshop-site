<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostVehicleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "registration_plate" => "required|string",
            "model_id" => "required|integer",
            "client_uuid" => "required|uuid",
            "vin" => "required|string",
            "engine" => "required|string",
            "tech_passport" => "required|string",
            "mileage" => "required|integer",
            "color" => "required|string",
        ];
    }
}
