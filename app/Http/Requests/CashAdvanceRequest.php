<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashAdvanceRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'deduction_date' => 'required',
            'status' => 'required',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }
    public function attributes()
    {
        # code...
        return [
            'deduction_date' => 'Deduction Date',
            'status' => 'Status',
            'amount' => 'Amount',
            'employee_id' => 'Employee'
        ];
    }
}
