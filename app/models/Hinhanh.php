<?php
class Hinhanh extends Eloquent{
	public $table = 'images';

	protected $fillable = array('title','summary','content','urlhinh','urlthumb','album_id','sort','show');

	public function album(){
		return $this->belongsTo('Album','album_id');
	}

	public static function boot(){
		parent::boot();

		static::created(function(){
			Cache::forget('image');
		});
		static::updated(function(){
			Cache::forget('image');
		});
		static::deleted(function(){
			Cache::forget('image');
		});
	}
}