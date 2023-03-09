<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccountability extends Model
{
    protected $guarded=[];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function accountability()
    {
        return $this->belongsTo(Accountability::class);
    }
}
