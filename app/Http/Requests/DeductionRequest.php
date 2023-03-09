<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeductionRequest extends FormRequest
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
            'deduction' => 'required|unique:deductions,deduction,' .$this->id,
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
    public function attributes()
    {
        # code...
        return [
            'deduction' => 'Deduction',
            'amount' => 'Amount'
        ];
    }
}
