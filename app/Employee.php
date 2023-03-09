<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $guard = 'portal';
    protected $dates = ['hire_date','birth_date','psu_issuance_date','nbi_validity','spouse_birth_date','spouse_married_date'];
    protected $fillable=[
        'image_path',
        'hire_date',
        'position_id',
        'employee_no',
        'first_name',
        'middle_name',
        'last_name',
        'contact_address',
        'email',
        'telephone',
        'no_bldg',
        'street_barangay',
        'municipality_city',
        'province',
        'zip_code',
        'mobile_no',
        'country_id',
        'birth_date',
        'birth_place',
        'gender',
        'civil_status',
        'height',
        'weight',
        'blood_type',
        'eye_color',
        'civil_status',
        'religion',
        'nationality',
        'foreign_language',
        'race',
        'sss_no',
        'philhealth_no',
        'pagibigid_no',
        'psu_no',
        'psu_issuance_date',
        'nbi_no',
        'nbi_validity',
        'member_type',
        'remarks',
        'recommended_by',
        'other_info',
        'password',
        'fathers_name',
        'fathers_occupation',
        'fathers_address',
        'mothers_name',
        'mothers_occupation',
        'mothers_address',
        'spouse_first_name',
        'spouse_last_name',
        'spouse_middle_name',
        'spouse_married_date',
        'spouse_birth_date',
        'spouse_birth_place',
        'spouse_occupation',
        'employment_status',
        'project_id',

    ];


    // public function getApplicationDateValue() {
    //     return $this->attributes['application_date']->format('d-m-Y');
    // }

    public function setHireDateValue($value) {
        $this->attributes['hire_date'] = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }
    public function setBirthDateValue($value) {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setKinBirthDateValue($value) {
        $this->attributes['kin_birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setSpouseMarriedDateValue($value) {
        $this->attributes['spouse_married_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setSpouseBirthDateValue($value) {
        $this->attributes['spouse_birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timeattendance()
    {
        return $this->hasMany(TimeAttendance::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function deduction()
    {
        return $this->hasMany(EmployeeDeduction::class);
    }

    public function cashadvance()
    {
        return $this->hasMany(CashAdvance::class);
    }

    public function employeeaccountability()
    {
        return $this->hasMany(EmployeeAccountability::class);
    }
    protected $hidden = [
        'password', 'remember_token',
    ];






}
