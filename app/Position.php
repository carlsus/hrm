<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    protected $guarded=[];
    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(Position::class);
    }

    public function employee()
    {
        return $this->hasMany(Position::class);
    }
}
