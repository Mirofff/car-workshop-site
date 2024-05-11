<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveStatementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "registration_date" => "required|date",
            "execution_date" => "required|date",
        ];
    }
}
