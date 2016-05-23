<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Userrequest extends Request {

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
			'txtUser' => 'required|unique:users,username',
			'txtPass' => 'required',
			'txtRePass' => 'required|same:txtPass',
			'txtEmail' => 'required'
		];
	}
	public function messages(){
		return [
			'txtUser.required' 	=> 'Please enter Username',
			'txtUser.unique'		=>	'This username is Exist',
			'txtPass.required' 	=> 'Please enter Password',
			'txtRePass.required' 	=> 'Please enter Password comrfirm',
			'txtRePass.same' 	=> 'Two password not match',
			'txtEmail.required' 	=> 'Please enter Email'
		];
	}
}
