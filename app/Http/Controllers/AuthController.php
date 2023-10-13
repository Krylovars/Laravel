<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth("web")->logout();
        return redirect()->route('home');
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required"],
            "password" => ["required"],
        ]);

        if (auth("web")->attempt($data)) {
            return redirect()->route('home');
        }

        return redirect(route("login"))->withErrors(["error" => "Неверный логин или пароль"]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "unique:users,email"],
            "password" => ["required", "confirmed"],
        ]);

        $user = \App\Models\User::create([
            "name" => "Имя",
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if ($user) {
            auth("web")->login($user);
            return redirect()->route('home');
        }
    }


}
