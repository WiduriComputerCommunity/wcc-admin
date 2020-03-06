<?php

namespace App\Models\MySql;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
  protected $connection = 'mysql';
  protected $table = 'log_wcc_admin';
  protected $primaryKey = 'user_id';

  protected $hidden = [
    'id',
    'created_at'
  ];

}