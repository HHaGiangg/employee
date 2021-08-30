<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|'.$this->id, //cái this->id là sao
            'department_id'   => 'required',
//            'dob'   => 'required',
            'sex'   => 'required',
            'address'   => 'required',
            'identity_card'   => 'required',
            'email'   => 'required',
            'phone'   => 'required',
//            'upload'   => 'required|mimes:jpg,png,jpeg|max:5048',
//            'date_join'   => 'required',
//            'date_entry'   => 'required',
//            'date_out'   => 'required',
//            'date_end'   => 'required',
            'exp_year'   => 'required',
        ];
    }
//    public function messages()
//    {
//        return [
//            'name.required' => 'Please enter information !',
//            'name.unique' => 'Please enter information !',
////            'dob.required' => 'Please enter information !',
////            'email.required' => 'Please enter information !',
////            'address.required' => 'Please enter information !',
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
