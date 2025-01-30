<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'emp_id';  // Correct primary key definition
    protected $guarded = [];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dep_id', 'dep_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'emp_id', 'emp_id');
    }
}
