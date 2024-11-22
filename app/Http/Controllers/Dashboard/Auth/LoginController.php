<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\auth\loginRequest;
use App\Services\Auth\AuthService;
use Flasher\Laravel\Facade\Flasher;
use \Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller implements HasMiddleware
{

    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public static function middleware()
    {
        return [
            new Middleware(middleware:'guest:admin' , except: ['logout'])
        ];
    }



    public function showLoginForm(){
        return view('dashboard.auth.login');
    }
    public function login(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$this->authService->login($credentials , 'admin' , $request->remember_me)){
            return redirect()->back()->withInput($request->only('email','remember'))
                ->withErrors(['email'=>'auth failed']);
        }
        flash()
            ->priority(3)
            ->success('Priority 3 → The operation was successful.');
        return redirect()->intended(route('dashboard.home'));

    }

    public function logout(){
        $this->authService->logout('admin');
        return redirect()->intended(route('dashboard.login'));

    }
}
