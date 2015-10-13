<?php 
namespace services\User;

use User;


class EloquentUser implements RepoInterface{
	private $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function select_all(){
		return $this->user->all();
	}

	public function find($id){
		return $this->user->find($id);
	}

	public function removeID($id){
		$this->user->destroy($id);
	}

	public function create($data){
		$this->user->create($data);
	}

	public function whereFirst($column,$con){
		return $this->user->where($colum,$con)->first();
	}

	public function whereAll($column, $con){
		return $this->user->where($column,$con)->get();
	}

	public function assignedRole($name,$role){
		$data = $this->user->where('username','=',$name)->first();
		$data->attachRole($role);
	}
}