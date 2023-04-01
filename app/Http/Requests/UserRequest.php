<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $routeName = $this->route()->getName();

        return [
            'name'=>'required|min:3|alpha',
            'phone_number'=>[$routeName == 'users.store' ? 'unique:users' : 'nullable' , 'numeric' , 'required'],
            'password'=>[$routeName == 'users.store' ? 'required' : 'nullable' , 'min:6'],
        ];
    }
}
