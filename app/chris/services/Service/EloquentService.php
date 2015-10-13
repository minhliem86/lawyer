<?php 
namespace services\Service;

use Service;


class EloquentService implements RepoInterface{
	private $service;

	public function __construct(Service $service){
		$this->service = $service;
	}

	public function select_all(){
		return $this->service->all();
	}

	public function find($id){
		return $this->service->find($id);
	}

	public function delete($id){
		$this->service->destroy($id);
	}

	public function deleteAll($column,$data){
		$this->service->whereIn($column,$data)->delete();
	}

	public function create($data){
		$this->service->create($data);
	}

	public function whereFirst($column,$con){
		return $this->service->where($colum,$con)->first();
	}

	public function whereAll($column, $con){
		return $this->service->where($column,$con)->get();
	}

	public function WhereOrderFirst($where,$valueWhere,$order_column,$order){
		return $this->service->where($where,$valueWhere)->Orderby($order_column,$oder)->first();
	}

	public function OderFirst($order_column,$order){
		return $this->service->OrderBy($order_column,$order)->first();
	}

	// FRONTEND
	public function paginate($num){
		return $this->service->where('show', 1)->paginate($num);
	}

	public function showSlug($slug){
		return $this->service->where('slug',$slug)->where('show',1)->first();
	}

	public function takeLimit($id, $take,$offset){
		return $this->service->where('id','<',$id)->orderby('id','DESC')->take($take)->offset($offset)->get();
	}
}