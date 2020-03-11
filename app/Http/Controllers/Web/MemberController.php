<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
  public function __construct()
  {
    $this->middleware('roles: 2');
  }

  public function index()
  {return view('member.member');
  }
}