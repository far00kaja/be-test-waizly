<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $primaryKey = 'employee_id';
    protected $table = 'employee';

    public $fillable = ['employee_id', 'name', 'job_title', 'salary', 'department', 'joined_date'];

    protected $hidden = ['deleted_at'];
}
