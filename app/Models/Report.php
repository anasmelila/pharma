<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Report extends Model
{
    use HasFactory;
    protected $primaryKey = 'rep_id';  // Correct primary key definition
    protected $guarded = [];
    protected $table="employee_reports";
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
    }



}
