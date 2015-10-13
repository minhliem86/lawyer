<?php 
namespace services\Customer;

use Customer;


class EloquentCustomer implements RepoInterface{
	private $customer;

	public function __construct(Customer $customer){
		$this->customer = $customer;
	}

	public function select_all(){
		return $this->customer->all();
	}

	public function find($id){
		return $this->customer->find($id);
	}

	public function delete($id){
		$this->customer->destroy($id);
	}

	public function deleteAll($column,$data){
		$this->customer->whereIn($column,$data)->delete();
	}

	public function create($data){
		$this->customer->create($data);
	}

	public function whereFirst($column,$con){
		return $this->customer->where($colum,$con)->first();
	}

	public function whereAll($column, $con){
		return $this->customer->where($column,$con)->get();
	}
}