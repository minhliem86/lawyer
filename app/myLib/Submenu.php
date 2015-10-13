<?php
class Submenu {
	public static function make($parent_model,$child_model,$foreignkey){
		$str = '';
		$data = \$parent_model::all();
		foreach ($data as $k=>$item){
			$data2 = $child_model::where($foreignkey,'=',$k);
			foreach($data2 as $item2){

				$str .= "<li><a href='#'>".$item2->tieude_vn."</a></li>";
				$str .= "</ul>";
			}
		}
	}
}