<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
     //constructor for middleware
     public function __contruct(){
        $this -> middleware('auth:api', [
            'except' => [
                'login',
                'register'
            ]
            ]);
    }
    // Logic to register the user
    public function register (Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user=User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password

        ]);

        $token = Auth::login($user);
        return response() -> json ([
            'status' => 'success',
            'message' => 'User Registered Succesfully',
            'user' => $user,
            'token' => $token

        ]);
    }

    public function login(Request $request){
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // After this validation we need to authenticate user
        $credentials=$request -> only('email', 'password');

        $token = Auth::attempt($credentials);

        if(!$token) {
            // If the Authentification fails return this response it means token doesn't generate
            return response() -> json([
                'status' => 'error',
                'message' => 'Login failed'
            ]);

        }
        // Now if token generated we just need to return our response here
        return response()->json([
            'status' => 'success',
            'message' => 'Logged in successfully',
            'token' => $token

        ]);
    }

    public function profile()
    {
        return response()->json([
            auth()->user()
        ]);
    }

     public function logout(){

        Auth()->logout();
        return response() -> json([
                'status' => 'success',
                'message' => 'Succesfully logged out'
            ]);

        }
}
