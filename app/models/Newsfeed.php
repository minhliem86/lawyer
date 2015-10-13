<?php
class Newsfeed extends Eloquent{
	public $table = 'newsfeed';

	protected $fillable = array('title','content','show','order','urlHinh','slug');

	// public static function boot(){
	// 	parent::boot();

	// 	static::created(function(){
	// 		Cache::forget('service');
	// 	});
	// 	static::updated(function(){
	// 		Cache::forget('service');
	// 	});
	// 	static::deleted(function(){
	// 		Cache::forget('service');
	// 	});
	// }	
}