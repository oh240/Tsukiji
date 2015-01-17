<?php
	use \Tsukiji\libs\controller;
	use \Tsukiji\libs\util;

	//use Model Import
	use \Tsukiji\models\Posts;

	/**
	 * Class postscontroller
	 */
	class posts_controller extends controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->Posts = new Posts;
		}

		public function index()
		{
			$results = $this->Posts->all();

			if (!$results){
				$this->statusCode = 404;
				$results = "Not Found";
			}

			$this->jsonSet($results,"OK");
		}

		public function show()
		{
			$result = $this->Posts->find($this->params['id']);

			if (!$result){
				$result = "Not Found";
			}

			$this->jsonSet($result,"OK");
		}

		public function create()
		{
			$this->Posts->title = $this->receiveData['title'];

			if($this->Posts->save()){
				$this->statusCode = 201;
				$message = "Created";
			} else {
				$this->statusCode = 403;
				$message = "Error";
			}

			$this->jsonSet(null,$message);
		}

		public function update()
		{
			$post = $this->Posts->find($this->params['id']);
			$post->title = $this->receiveData['title'];

			if ($post->save()){
				$message = "Updated";
			} else {
				$this->statusCode = 403;
				$message = "Error";
			}

			$this->jsonSet(null,$message);
		}

		public function delete()
		{
			if ($post = $this->Posts->find($this->params['id'])){
				if ($post->delete()){
					$this->statusCode = 201;
					$message = "Deleted";
				} else {
					$this->statusCode = 400;
					$message = "Error";
				}
			} else {
				$this->statusCode = 404;
				$message = "Data Not Found";
			}

			$this->jsonSet(null,$message);
		}
	}