<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            $token = $token->plainTextToken;
            setcookie('authUser', $token, time() + (86400 * 30), '/');
            return response([
                'message' => 'User logged in !',
                'auth' => Auth::user()->name,
                'token' => $token,
            ], 200);
                //laravel cookie
                //->cookie(
               // 'authUser', $token->plainTextToken, time() + (86400 * 30), "/"
            //);
        } else {
            return response('User not found', 404);
        }

    }

    public function logout()
    {

        if(isset($_COOKIE['authUser'])) {
         setcookie("authUser","",time() -(86400 * 60));
        }
        $user=Auth::user();
        Session::flush();
        Session::save();
//        \Cookie::forget('XSRF-TOKEN');
//        \Cookie::forget('authUser');
//        \Cookie::forget('laravel_session');
//        $cookie1 =  Cookie::queue(Cookie::forget('XSRF-TOKEN'));
//        $cookie2 =  Cookie::queue(Cookie::forget('authUser'));
//        $cookie3 =  Cookie::queue(Cookie::forget('laravel_session'));
        $user->tokens()->delete();
        return response('logged out', 200);
//            ->withCookie($cookie1,$cookie2,$cookie3);
//            ->cookie('delete_all','nothing',time()+60*60,'/');
    }

}
