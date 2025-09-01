<?php

namespace App\Presentation\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    public function credentials(): array
    {
        return $this->only('name', 'email', 'password');
    }
}