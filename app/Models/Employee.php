<?php

// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'designation']; // Fillable fields
}

