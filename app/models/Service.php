<?php
class Service extends Eloquent{
	public $table = 'services';

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