<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class MaintenanceController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware('roles: 1');
  // }

  public function index()
  {return view('maintenance');
  }
}