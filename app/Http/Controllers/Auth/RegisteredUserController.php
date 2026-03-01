<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'in:customer,admin'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Validate security code if registering as admin
        if ($request->role === 'admin') {
            $request->validate([
                'security_code' => ['required'],
            ]);

            if ($request->security_code !== env('ADMIN_REGISTRATION_CODE')) {
                return back()->withErrors([
                    'security_code' => 'Security code is incorrect.',
                ])->onlyInput('name', 'email', 'role');
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Registration successful! Please login.');
    }
}
