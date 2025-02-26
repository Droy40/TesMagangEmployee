<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function opnameResults()
    {
        return $this->hasMany(Employee::class, 'dept_id', 'id');
    }
}
