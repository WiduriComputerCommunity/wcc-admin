<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MySql\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
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
      abort(401, 'This action is unauthorized.');
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
      'nama' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'roles' => 'required|numeric' 
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => $validator->errors()
      ], 500);
    }

    $users = User::where('id', $id)->first();

    if ($users != null) {
      
      $users->nama = $request->name;
      $users->email = $request->email;
      $users->password = $request->password;
      $users->is_active = intval($request->status);
      $users->roles = $request->roles;

      $checkuser = User::where('email', $request->email)
      ->where('roles', $users->roles)
      ->first();

      if ($checkuser != null) {
        return response()->json([
          'status' => false,
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
      'nama'     => 'required',
      'email'    => 'required|email',
      'password' => 'required',
      'roles'    => 'required|numeric'
    ]);

    if ($validator->fails()) {
      return response()-> json([
        'status'  => false,
        'message' => $validator->errors()
      ], 500);
    }

    $checkuser = User::where('email', $request->email)
    ->where('roles', $request->roles)
    ->first();

    if ($checkuser !== null) {
      return response()->json([
        'status' => false,
        'message' => 'Email dengan roles ini sudah ada.!'
      ]);
    }

    $users            = new User;
    $users->nama      = $request->nama;
    $users->email     = $request->email;
    $users->password  = $request->password;
    $users->is_active = 1;
    $users->roles     = $request->roles;
    $users->save();

    return response()->json([
      'status'  => true,
      'message' => 'User berhasil ditambah',
      'result'  => $users
    ]);
  }
}