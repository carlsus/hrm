<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'hire_date' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc|unique:employees,email,' .$this->id,
            'position_id' => 'required|exists:positions,id',
            'employment_status' => 'required',
            'project_id' => 'required|exists:projects,id',
            'contact_address' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ];
    }
    public function attributes()
    {
        return [
            'hire_date' => 'Date Hired',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email Address',
            'position_id' => 'Position',
            'employment_status' => 'Employment Status',
            'project_id' => 'Project',
            'image_path' => 'Image',
            'contact_address' => 'Contact Address',
        ];
    }
}
