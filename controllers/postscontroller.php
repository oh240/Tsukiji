<?php
	use \pwaf\libs\controller;
	use \pwaf\libs\util;

	//使用するモデルをImport
	use \pwaf\models\Users;


	/**
	 * Class postscontroller
	 */
	class postscontroller extends controller
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$users = Users::all();

			if (!$users){
				$this->statusCode = 201;
			}
			$this->jsonSet($users,"OK");
		}

		public function show()
		{
			$id = $this->params['id'];

			$user = Users::find($id);
			if (empty($user)){
				$this->statusCode = 201;
			}

			$this->jsonSet($user,"OK");
		}

		public function create()
		{
			$params = $this->receiveData;
		}

		public function update()
		{

		}

		public function delete()
		{

		}
	}