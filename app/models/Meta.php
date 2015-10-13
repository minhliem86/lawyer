<?php
class Meta extends Eloquent{
	public $table = 'meta';

	protected $fillable = array('meta_description', 'meta_keyword', 'email_nhanthongtin');
}