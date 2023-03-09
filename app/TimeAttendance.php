<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeAttendance extends Model
{
    protected $guarded=[];
    protected $dates = ['date_created','in_am','out_am','in_pm','out_pm'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function setDateCreatedValue($value) {
        $this->attributes['date_created'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

}
