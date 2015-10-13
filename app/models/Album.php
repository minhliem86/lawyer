<?php
class Album extends Eloquent{
	public $table = 'album';

	protected $fillable = array('title','urlhinh','sort','show','slug');

	public function hinhanh(){
		return $this->hasMany('Image','album_id');
	}

	// public static function boot(){
	// 	parent::boot();

	// 	static::created(function($all){
	// 		Cache::forget(array('menu_album'));
	// 	});

	// 	static::updated(function($all){
	// 		Cache::forget(array('menu_album'));
	// 	});

	// 	static::deleted(function($all){
	// 		Cache::forget(array('menu_album'));
	// 	});
	// }
}