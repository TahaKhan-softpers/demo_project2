<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $userService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

//    public function index(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|string|email|max:255unique:users',
//            'password' => 'required|string|min:8confirmed',
//        ]);
//
//    }
    public function login(Request $request)
    {
        if (Auth::attempt(array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ))) {
            session([
                'name' => $request->get('name'),
            ]);
            $token = Auth::user()->createToken('token-tester');

            return response([
                'message' => 'User logged in !',
                'token' => $token->plainTextToken,
                'auth' => Auth::user()->name,
            ], 200);
        } else {
            return response('User not found', 401);
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::user()->tokens()->delete();
//        Auth::logout();
        return response('logged out', 200);
    }

}
