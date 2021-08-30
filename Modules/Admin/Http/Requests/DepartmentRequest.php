<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:departments,name,'.$this->id,
//            'position_id' => 'required',
//            'action' => 'required',
            'description' => 'required',
        ];
    }
//    public function messages()
//    {
//        return [
//            'name.required' => 'Please enter information !',
//            'name.unique' => 'Please enter information !',
//            'description.required' => 'Please enter information !',
//        ];
//    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
