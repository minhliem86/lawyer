<?php
class Home  extends Eloquent{
	public $table = 'home';

	public $fillable = array('title','content','slug','show');

	// public static function boot(){
	// 	parent::boot();

	// 	static::updating(function(){
	// 		Cache::forget('about');
	// 	});
	// }
}