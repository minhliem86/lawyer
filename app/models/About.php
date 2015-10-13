<?php
class About  extends Eloquent{
	public $table = 'about';

	public $fillable = array('title','content');

	public static function boot(){
		parent::boot();

		static::updating(function(){
			Cache::forget('about');
		});
	}
}