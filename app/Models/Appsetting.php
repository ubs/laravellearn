<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appsetting extends Model
{
    protected $fillable = ['setting', 'value', 'is_active'];
}
