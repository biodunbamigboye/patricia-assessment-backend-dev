<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;

class AuthController extends Controller
{

    protected $tokenName = 'apitoken';
    /**
     *
     *Password is a minimum of 6 Characters and
     *Maximum of 12 Characters
     */
    public function register (Request $request)
    {
       // return auth()->user();
    $fields = $request->validate([
        'name' => 'required|string',
        'email' => 'required|unique:users,email|email',
        'password' => 'required|string|confirmed|min:6|max:12'
    ]);
    $user= User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password'])
    ]);

    $token = $user->createToken($this->tokenName)->plainTextToken;

    $response = [
    'user' => $user,
    'token' => $token,
    'success' => true,
    'message' => 'registration successful'
    ];
    return response($response,201);

    }

    public function login (Request $request)
    {
    $fields = $request->validate([
        'email' => 'required | string ',
        'password' => 'required|string'
    ]);
    $user= User::where(['email' => $fields['email']])->get()->first();

    if(!$user || !Hash::check($fields['password'], $user->password) ) return response([
        'message' => 'invalid login details',
        'success' => false,
    ]);

    $token = $user->createToken($this->tokenName)->plainTextToken;

    $response = [
    'user' => $user,
    'token' => $token,
    'success' => true,
    'message' => 'login successful'
    ];
    return response($response,201);

    }

    public function logout()
    {

       auth()->user()->tokens()->delete();
        return response(
            [
                'message' => 'user logged out',
                'success' => true
        ]);
    }

    public function getCurrentUser(){
    return [
        'success' => is_object(auth()->user()),
        'userData' => auth()->user()
    ];
    }


}
