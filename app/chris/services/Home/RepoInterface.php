<?php

namespace services\Home;

interface RepoInterface{
	public function select_first();

	public function save();

	public function create($data);
}