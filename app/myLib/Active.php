<?php
class Active{
	public static function setActive($segment,$route,$class='active'){
		return (\Request::segment($segment) == $route ? $class : '');
	}
}