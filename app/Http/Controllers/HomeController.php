<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request): RedirectResponse {

        if ($request->session()->exists('username')) {
            // jika sudah login 
            return redirect('/todolist');
            # code...
        } else {
            return redirect('/login');
        }
        
    }
}
