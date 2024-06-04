<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'gen_date',
        'gen_user',
        'status',
    ];
}