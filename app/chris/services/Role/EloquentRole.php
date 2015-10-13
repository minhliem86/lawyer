<?php 
namespace services\Role;

use Role;

class EloquentRole implements RepoInterface{
	private $role;
	
	public function __construct(Role $role){
		$this->role = $role;
	}

	public function addRole($name){
		$this->role->name = $name;
		$this->role->save();
	}

	// public function select_all(){
	// 	return $this->role->all();
	// }

	// public function find($id){
	// 	return $this->role->find($id);
	// }

	// public function removeID($id){
	// 	$this->role->destroy($id);
	// }

	// public function create($data){
	// 	$this->role->create($data);
	// }

	// public function whereFirst($column,$con){
	// 	return $this->role->where($colum,$con)->first();
	// }

	// public function whereAll($column, $con){
	// 	return $this->role->where($column,$con)->get();
	// }	
}