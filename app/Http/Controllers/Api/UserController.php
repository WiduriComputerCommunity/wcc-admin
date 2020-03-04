<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MySql\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithEvents;

class UserController extends Controller
{

  // use RegistersUsers;
  
  // /**
  //  * Where to redirect users after registration.
  //  *
  //  * @var string
  //  */
  // protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(Request $request)
  {
    $attempts = [
      'email'     => $request->header('PHP_AUTH_USER'),
      'password'  => $request->header('PHP_AUTH_PW'),
      'is_active' => true,
      'roles'     => 1
    ];



    if (!Auth::attempt($attempts)) {
      Auth::logout();
      // abort(401, 'This action is unauthorized.');
    }
  }

  public function index(Request $request)
  {
    $users = User::orderBy('id', 'desc')->get();

    return response()->json([
      'status' => true,
      'result' => $users
    ]);
  }

  public function detail($id)
  {
    $users = User::where('id', $id)->first();

    if ($users != null) {
      return response()->json([
        'status' => true,
        'result' => $users
      ]);
    } else {
      return response()->json([
        'status'  => false,
        'message' => 'user not found'
      ]);
    }
  }

  public function edit(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'nama'     => 'required',
      'email'    => 'required|email',
      'password' => 'required',
      'roles'    => 'required|numeric' 
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status'  => false,
        'message' => $validator->errors()
      ], 500);
    }

    $users = User::where('id', $id)->first();

    if ($users != null) {
      
      $users->nama      = $request->name;
      $users->email     = $request->email;
      $users->password  = $request->password;
      $users->is_active = intval($request->status);
      $users->roles     = $request->roles;

      $checkuser = User::where('email', $request->email)
      ->where('roles', $users->roles)
      ->first();

      if ($checkuser != null) {
        return response()->json([
          'status'  => false,
          'message' => 'Email dengan roles ini sudah ada.!'
        ]);
      }

      $users->save();

      return response()->json([
        'status'  => true,
        'message' => 'Update user berhasil',
        'result'  => $users
      ]);
    } else {
      
      return response()->json([
        'status'  => false,
        'message' => 'User not found'
      ]);
    }
  }

  public function register(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'nama' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
      'password_confirmation' => ['required', 'min:8', 'same:password'],
      'notelp' => ['required', 'min:11', 'regex:/(62)[0-9]{9}/']
    ]);

    if ($validator->fails()) {
      return redirect('register')
      ->withErrors($validator)
      ->withInput();
    }

    $checkuser = User::where('email', $request->email)
    ->where('roles', $request->roles)
    ->first();

    if ($checkuser !== null) {
      return response()->json([
        'status'  => false,
        'message' => 'Email dengan roles ini sudah ada.!'
      ]);
    }

    $users = User::create([
      'nama'      => $request->nama,
      'email'     => $request->email,
      'notelp'    => $request->notelp,
      'alamat'    => $request->alamat,
      'password'  => $request->password,
      'is_active' => true,
      'roles'     => 1
    ]);

    return redirect('login');
    // return response()->json([
    //   'status'  => true,
    //   'message' => 'User berhasil ditambah',
    //   'result'  => $users
    // ]);
  }

  public function destroy($id)
  {
    $users = User::where('id', $id)->first();

    if ($users != null) {
      User::where('id', $id)->delete();

      return response()->json([
        'status'  => true,
        'message' => 'User berhasil di delete',
        'result'  => $users->nama
      ]);
    } else {
      
      return response()->json([
        'status'  => false,
        'message' => 'User not found'
      ]);
    }
  }
}