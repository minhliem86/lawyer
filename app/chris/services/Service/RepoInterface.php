<?php

namespace services\Service;

interface RepoInterface{
	public function select_all();

	public function find($id);

	public function delete($id);

	public function deleteAll($column,$data);

	public function create($data);

	public function whereFirst($column,$con);

	public function whereAll($column,$con);

	public function WhereOrderFirst($where,$valueWhere,$order_column,$order);

	public function showSlug($slug);

	public function takeLimit($id,$take,$offset);

	public function paginate($num);

}