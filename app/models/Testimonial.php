<?php
class Testimonial extends Eloquent{
	public $table = 'testimonial';

	protected $fillable = array('title','content','show','order','urlHinh','slug','owner');

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