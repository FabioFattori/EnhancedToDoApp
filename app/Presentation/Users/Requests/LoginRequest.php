<?php

namespace App\Presentation\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array{ email: string| array<string> , password: string| array<string> }
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * @return array{ email:string, password: string }
     */
    public function credentials(): array
    {
        /** @var array{ email:string, password: string } $credentials */
        $credentials =  $this->only('email', 'password');
        return $credentials;
    }
}
