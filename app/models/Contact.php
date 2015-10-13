<?php
class Contact extends Eloquent{
	public $table = "contact";

	protected $fillable = array('phone', 'email', 'address', 'map');

	// public static function boot(){
	// 	parent::boot();

	// 	static::updated(function(){
	// 		Cache::forget('contact');
	// 	});
	// }
}