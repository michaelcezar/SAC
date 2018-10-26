<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'email',
    ];

}
