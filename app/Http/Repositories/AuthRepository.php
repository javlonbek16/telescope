<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthRepository implements AuthInterface
{
    public function register(RegisterRequest $request)
    {
        $filePath = $request->file('image')->store('upload/users', 'public');

        $user = User::create([
            'username' => $request->username,
            'password' =>  bcrypt($request->password),
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image' =>  $filePath,
            'fullname' => $request->fullname,
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(['token' => $token], 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        if (Auth::attempt($credentials)) {

            $user = $request->user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json(['token' => $token]);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
