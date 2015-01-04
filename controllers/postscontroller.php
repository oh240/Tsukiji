<?php
	use \pwaf\libs\controller;
	use \pwaf\libs\util;
	use \pwaf\libs\json;

	/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/01/02
 * Time: 0:36
 */

	class postscontroller extends controller
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			json::set(500);
		}

		public function show()
		{
			$id = $this->params['id'];
			json::set($id);
		}

		public function create()
		{

		}

		public function update()
		{

		}

		public function delete()
		{

		}
	}