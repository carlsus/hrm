<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeAccountabilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'accountability_id' => 'required|exists:accountabilities,id',
            'employee_id' => 'required|exists:employees,id',
        ];
    }
    public function attributes()
    {
        return [
            'employee_id' => 'Employee',
            'accountability_id' => 'Accountability'
        ];
    }
}
