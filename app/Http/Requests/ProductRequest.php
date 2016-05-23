<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'slcparent' => 'required',
			'txtName' => 'required|unique:products,name',
			'fImages' => 'required'
		];
	}
	public function messages(){
		return [
			'slcparent.required'	=> 	'Please Choose Parent Category',
			'txtName.required' 		=> 	'Please enter Name Category',
			'txtName.unique'		=>	'This Name product is Exist',
			'fImages.required'		=> 	'Please Choose Images'
		];
	}
}
