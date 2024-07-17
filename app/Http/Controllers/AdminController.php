<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $username = $request->input('username');
            $password = $request->input('password');
    
            if ($username === env('ADMIN_USER_NAME') && $password === env('ADMIN_PASSWORD')) {
                $request->session()->put('is_admin_authenticated', true);
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->withErrors(['Invalid credentials.']);
            }
        } 
            return view('admin.auth.login');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }
}
