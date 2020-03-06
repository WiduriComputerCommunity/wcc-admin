<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if (Auth::check()) {
        
        return redirect('dashboard');
      
      } else {
        
        return view ('login');
      
      }
    }

    public function register()
    {
      return view ('register');
    }

    public function login(Request $request)
    {
      if (Auth::check()) {
        switch (intval($request->session()->get('roles'))) {
          case 1:
            $redirect = 'dashboard';
            break;

          case 2:
            $redirect = 'dashboard-member';
          
          default:
            abort(401, 'This action is unauthorized.');
            break;
        }
        return redirect($redirect)->with('welcome', 'Selamat Datang ' . $request->session()->get('nama'));
      } else {
        return view('login');
      }
    }

    public function attempt(Request $request)
    {
      $attempts = [
        'email'     => $request->email,
        'password'  => $request->password,
        'is_active' => true,
        'roles'     => intval($request->roles),
        'deleted_at' => null
      ];

      if (Auth::attempt($attempts)) {
        $user_data = Auth::user();
        Session::put('user_id', intval($user_data->id));
        Session::put('nama', $user_data->nama);
        Session::put('email', $user_data->email);
        Session::put('roles', intval($user_data->roles));

        switch (intval($user_data->roles)) {
          case 1:
            $redirect = 'dashboard';
            break;

          case 2:
            $redirect = 'dashboard-member';
            break;

          default:
            abort(401, 'This action is unauthorized');
            break;
        }
        return redirect($redirect)->with('Welcome', 'Selamat Datang ' .$user_data->nama);
      }
      return redirect()->back()
        ->withErrors('Email atau password yang anda masukkan salah ..')
        ->withInput();
    }

    // public function register(Type $var = null)
    // {
    //   # code...
    // }

    public function logout(Request $request)
    {
      Auth::logout();
      Session::flush();
      return redirect('login');
    }
    
}
