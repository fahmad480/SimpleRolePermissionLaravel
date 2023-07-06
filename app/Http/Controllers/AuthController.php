<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard_page');
        }

        return redirect()->route('auth')->with('error', 'Invalid credentials');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
        
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => 2,
                    'created_by' => 'register',
                ]);
            });
        
            return redirect()->route('auth')->with('success', 'User created');
        } catch (\Exception $e) {
            return redirect()->route('auth')->with('error', $e->getMessage());
        }
    }

    public function postLogout() {
        auth()->logout();

        return redirect()->route('auth')->with('success', 'Logout success');
    }
}
