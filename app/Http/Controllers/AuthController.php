<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|max:255",
                "phone" => "required|string|max:13|unique:users,phone",
                "password" => "required|string|min:6",
            ]
        );
        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);
        return response()->json(
            [
                "token" => $user->createToken("api token")->plainTextToken
            ]
        );
    }

    public function login(Request $request)
    {
        $data = $request->validate(
            [
                "phone" => "required|string|max:13",
                "password" => "required|string|min:6",
            ]
        );

        if (!Auth::attempt($data)) {
            return response()->json(
                [
                    "message" => "dont find your user"
                ],
                401);
        }
        return response()->json(
            [
                "token" => Auth::user()->createToken("api token")->plainTextToken
            ]
        );
    }
}
