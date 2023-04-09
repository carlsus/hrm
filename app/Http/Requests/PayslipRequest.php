<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayslipRequest extends FormRequest
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

            'date_start' => 'required',
            'date_end' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'date_start' => 'From Date',
            'date_end' => 'To Date'
        ];
    }
}
