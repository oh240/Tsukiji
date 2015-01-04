<?php
	use \pwaf\libs\controller;
	use \pwaf\libs\util;

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
			//$result = util::escape("<html>escaped</html>");
			$this->json->set(500);
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