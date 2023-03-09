<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded=[];
    public function position(){
        return $this->belongsTo(Position::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
