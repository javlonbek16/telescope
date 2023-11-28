<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public AuthInterface $auth)
    {
    }
    public function register(RegisterRequest $request)
    {
        return $this->auth->register($request);
    }
    public function login(LoginRequest $request){
        return $this->auth->login($request);
    }
}
