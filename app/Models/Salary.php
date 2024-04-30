<?php

// app/Models/Salary.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['employee_id', 'salary', 'month', 'year']; // Fillable fields

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
