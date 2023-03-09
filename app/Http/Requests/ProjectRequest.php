<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'project_name' => 'required|unique:projects,project_name,' .$this->id ,
            'location' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'project_name' => 'Project Name',
            'location' => 'Location'
        ];
    }
}
