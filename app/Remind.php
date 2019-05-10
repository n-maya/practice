<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remind extends Model
{
      protected $fillable = [
          'email',
          'body',
          'send_at',
      ];
}
