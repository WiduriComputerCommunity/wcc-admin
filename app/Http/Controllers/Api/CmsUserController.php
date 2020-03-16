<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MySql\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CmsUserController extends Controller
{

  public function __construct()
  {
    $this->middleware(['roles: 1']);
  }

  public function getUser()
  {
    $user = User::select([
      'users.id',
      'users.noinduk',
      'users.nama',
      'users.email',
      'users.notelp',
      'users.description',
      'user_roles.id as roles_id',
      'user_roles.roles',
      'users.is_active'
      ])
      ->leftJoin('user_roles', 'user_roles.id', '=', 'users.roles')
      ->orderBy('created_at', 'desc');

    return DataTables::of($user)
    ->addColumn('action', function ($data) {
      return '<a href="#edit-'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
    })
    ->make(true);
  }

  public function deleteUser($id)
  {
    $users = User::where('id', $id)->first();
    
    $users->is_active = 0;
    $users->deleted_at = now();
    $users->save();

    return response()->json([
      'status' => true,
      'message' => 'Delete user berhasil',
      'result' => $users
    ]); 
  }
}
