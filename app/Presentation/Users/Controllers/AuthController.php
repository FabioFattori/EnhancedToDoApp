<?php

namespace App\Presentation\Users\Controllers;

use App\Application\Users\Contracts\UserServiceContract;
use App\Infrastructure\Users\Models\User;
use App\Presentation\Users\Requests\LoginRequest;
use App\Presentation\Users\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

readonly class AuthController
{
    public function __construct(
        private UserServiceContract $usersService
    ) {
    }

    public function loginIndex(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function registerIndex(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->credentials())) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->usersService->create(User::fromArray($request->userData()));

        if (Auth::attempt($request->credentials())) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
