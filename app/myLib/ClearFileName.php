<?php
class ClearFileName{
	public static function make($filename){
		//remove space
		$filename = preg_replace('/\s+/','', $filename);
		//remove character
		// $filename = preg_replace("/[^A-Za-z0-9_-\s.]/", "", $filename);
		return $filename;
	}
}