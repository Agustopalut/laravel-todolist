<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function login() {
        // login page
        return view('user.login',[
            'title' => 'Login'
        ]);
    }

    public function doLogin(Request $request)  {

        $username = $request->input('username');
        $password = $request->input('password');

        if(empty($username) || empty($password)) {
            return view('user.login',[
                'title' => 'Login',
                'error' => 'username atau password wajib diisi'
            ]);
        }

        if($this->userService->login($username, $password)) {
            // jika berhasil login
            $request->session()->put('username',$username); //membuat session
            return redirect('/');
        }
        
        // jika gagal login
        return view('user.login',[
            'title' => 'Login',
            'error' => 'username atau password salah'
        ]);
    }

    public function doLogout(Request $request) {
        // registration page
        $request->session()->forget('username'); //menghapus session
        return redirect('/login');
    }


}
