<?php
namespace validations;

use Illuminate\Support\MessageBag;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Validator;

abstract class BaseForm{
	protected $validation;

	protected $validator;

	public function __construct(ValidatorFactory $factory){
		$this->validator = $factory;
	}

	public function validate(array $input){
		$this->validation = $this->validator->make($input,$this->rules());

		if($this->validation->fails()){
			throw new FormValidationException('Validation Failed',$this->getErrors());
		}

		return true;
	}

	abstract protected function rules();

	// protected function messages(){

	// }

	protected function getErrors(){
		return $this->validation->errors();
	}

}