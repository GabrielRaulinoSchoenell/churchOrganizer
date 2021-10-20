<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowed_day extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $filable = ['user_id', 'day'];
}
