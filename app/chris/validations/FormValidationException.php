<?php
namespace validations;

use Exception;
use Illuminate\Support\MessageBag;

class FormValidationException extends Exception{
	protected $errors;

	public function __construct($message = "", MessageBag $errors, $code=0, Exception $previous=null){
		$this->errors = $errors;
		parent::__construct($message,$code,$previous);
	}

	public function getErrors(){
		return $this->errors;
	}
}