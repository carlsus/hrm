<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountability extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employeeaccountability()
    {
        return $this->hasMany(EmployeeAccountability::class);
    }

}
