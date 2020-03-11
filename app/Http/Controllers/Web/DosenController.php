<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class DosenController extends Controller
{
  public function __construct()
  {
    $this->middleware('roles: 3');
  }

  public function index()
  {return view('dosen.dosen');
  }
}