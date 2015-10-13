<?php
class TachchuoiImg {
	public static function make($chuoi,$kytu,$vitricanlay){
		$mang = explode($kytu,$chuoi);
		$str = $mang[$vitricanlay];
		return $str;
	}

}