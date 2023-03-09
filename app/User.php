<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function department()
    {
        return $this->hasMany(Department::class);
    }


    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function position()
    {
        return $this->hasMany(Position::class);
    }

    public function deduction()
    {
        return $this->hasMany(Deduction::class);
    }

    public function accountability()
    {
        return $this->hasMany(Accountability::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function payslip()
    {
        return $this->hasMany(Payslip::class);
    }
}
