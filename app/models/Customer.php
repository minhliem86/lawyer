<?php

class Customer extends Eloquent{
	public $table = "customers";

	protected $fillable = array('fullname', 'phone', 'email', 'message', 'show');
}