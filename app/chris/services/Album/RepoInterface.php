<?php
namespace services\Album;

interface RepoInterface {
	public function select_all();

	public function find($id);

	public function remove($id);

	public function create($data);

	public function orderbyFirst($column,$prop);

	public function sortAll($column,$prop);

	public function deleteAll($column,$arr);

	public function listbyid($id,$key,$val);

	public function lists($key,$val);

	public function WhereOrderBy($columnWhere,$operate = '=',$value,$columnOrder,$valueOrder);

	public function whereFirst($column,$value,$operate = '=');

}