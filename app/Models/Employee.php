<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'address',
        'dob',
        'dept_id',
        'status'
    ];
    public $timestamps = true;

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }
}
