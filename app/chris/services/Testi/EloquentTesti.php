<?php 
namespace services\Testi;

use Testimonial;


class EloquentTesti implements RepoInterface{
	private $testi;

	public function __construct(Testimonial $testi){
		$this->testi = $testi;
	}

	public function select_all(){
		return $this->testi->all();
	}

	public function find($id){
		return $this->testi->find($id);
	}

	public function delete($id){
		$this->testi->destroy($id);
	}

	public function deleteAll($column,$data){
		$this->testi->whereIn($column,$data)->delete();
	}

	public function create($data){
		$this->testi->create($data);
	}

	public function whereFirst($column,$con){
		return $this->testi->where($colum,$con)->first();
	}

	public function whereAll($column, $con){
		return $this->testi->where($column,$con)->get();
	}

	public function WhereOrderFirst($where,$valueWhere,$order_column,$order){
		return $this->testi->where($where,$valueWhere)->Orderby($order_column,$oder)->first();
	}

	public function OderFirst($order_column,$order){
		return $this->testi->OrderBy($order_column,$order)->first();
	}

	// FRONTEND
	public function paginate($num){
		return $this->testi->where('show', 1)->paginate($num);
	}

	public function showSlug($slug){
		return $this->testi->where('slug',$slug)->where('show',1)->first();
	}

	public function takeLimit($id, $take,$offset){
		return $this->testi->where('id','<',$id)->orderby('id','DESC')->take($take)->offset($offset)->get();
	}
}