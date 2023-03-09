<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'position' => 'required|unique:positions,position,' .$this->id ,
            'probationary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'regular' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'department_id' => 'required|exists:departments,id'
        ];
    }
    public function attributes()
    {
        return [
            'position' => 'Position Name',
            'probationary' => 'probationary',
            'regular' => 'Regular',
            'department_id' => 'Department',
        ];
    }
}
