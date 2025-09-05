<?php

namespace App\Presentation\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array{ name: string| array<string> , email: string| array<string> , password: string| array<string> , confirm_password: string| array<string> }
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    /**
     * @return array{ email:string, password: string }
     */
    public function credentials(): array
    {
        /** @var array{ email:string, password: string } $credentials */
        $credentials = $this->only('email', 'password');
        return $credentials;
    }


    /**
     * @return array{ name:string, email:string, password: string }
     */
    public function userData(): array
    {
        /** @var array{ name:string, email:string, password: string } $userData */
        $userData = $this->only('name', 'email', 'password');
        return $userData;
    }
}
