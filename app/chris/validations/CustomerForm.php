<?php
namespace validations;

class CustomerForm extends baseform{
	public function rules(){
		return [
			'captcha'=>'required|captcha',
			'fullname'=> 'required|max:200',
			'email'=> 'email|required',
			'phone'=>'required',
		];
	} 
}