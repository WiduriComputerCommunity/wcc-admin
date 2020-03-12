<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class MahasiswaSettingController extends Controller
{
  public function __construct()
  {
    $this->middleware('roles: 1|3');
  }

  public function index()
  {
    return view('mhs-tools.setting');
  }
}