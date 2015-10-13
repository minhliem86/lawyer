<?php
namespace services\Image;

use Hinhanh;

class EloquentImage implements RepoInterface{
	protected $image;

	public function __construct(Hinhanh $image){
		$this->image = $image;
	}

	public function select_all(){
		return $this->image->all();
	}

	public function find($id){
		return $this->image->find($id);
	}

	public function remove($id){
		$this->image->destroy($id);
	}

	public function create($data){
		return $this->image->create($data);
	}

	public function insertMulti($data){
		\DB::table('images')->insert($data);
	}

	public function orderbyFirst($column,$prop){
		return $this->image->OrderBy($column,$prop)->first();
	}

	public function orderFirstWhere($where,$valueWhere,$column,$prop){
		return $this->image->where($where,$valueWhere)->OrderBy($column,$prop)->first();
	}

	public function deleteAll($column,$arr){
		return $this->image->whereIn($column,$arr)->delete();
	}

	public function with($with){
		return $this->image->with($with)->get();
	}

	public function paginate($sl){
		return $this->image->paginate($sl);
	}

	public function getRand($limit){
		return $this->image->OrderbyRaw('RAND()')->take($limit)->get();
	}

	public function where($column,$operate = '=',$value){
		return $this->image->where($column,$operate, $value)->get();
	}
}