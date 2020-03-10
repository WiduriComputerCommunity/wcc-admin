<?php

namespace App\Models\MySql;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
  use Notifiable;
  use SoftDeletes;

  protected $connection = 'mysql';

  protected $fillable = [
    'nama', 'email', 'password', 'roles', 'notelp', 'description', 'is_active'
  ];

  protected $hidden = [
    'password', 'remember_token', 'deleted_at'
  ];

  public $casts = [
    'is_active' => 'boolean'
  ];

  public function setPasswordAttribute($password)
  {
    $this->attributes['password'] = bcrypt($password);
  }
}

