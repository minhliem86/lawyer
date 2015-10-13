<?php 
namespace services\Permission;

use Permission;

class EloquentPermission implements RepoInterface{
	private $permission;
	
	public function __construct(Permission $permission){
		$this->permission = $permission;
	}

	public function addPermission($name,$display_name){
		$this->permission->name = $name;
		$this->permission->display_name = $display_name;
		$this->permission->save();
	}

	// public function select_all(){
	// 	return $this->permission->all();
	// }

	// public function find($id){
	// 	return $this->permission->find($id);
	// }

	// public function removeID($id){
	// 	$this->permission->destroy($id);
	// }

	// public function create($data){
	// 	$this->permission->create($data);
	// }

	// public function whereFirst($column,$con){
	// 	return $this->permission->where($colum,$con)->first();
	// }

	// public function whereAll($column, $con){
	// 	return $this->permission->where($column,$con)->get();
	// }	
}