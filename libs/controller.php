<?php
	namespace Tsukiji\libs;

	use Tsukiji\libs\json;
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/01/02
 * Time: 11:51
 */

	/**
	 * Class controller
	 * @package pwaf\libs
	 */
	class controller
	{
		public $receiveData;
		public $getQuery;
		public $httpMethod;
		public $controllerName;
		public $actionName;
		public $statusCode;
		public $params;
		protected $debugLevel;

		//メッセージが指定されていない場合はこちらから検索して自動で行う。
		protected $statusCodeDefaultMessages = [
			200 => "OK",
		    201 => "Created",
		    400 => "But Request",
			401 => "Unauthorized",
			404 => "Not Found",
		];
		/**
		 * initial Controller
		 */
		public function __construct()
		{
			$this->statusCode = 200;
			$this->debugLevel = DEBUG_LEVEL;
		}

		/**
		 * @param $params
		 * @param $message
		 */
		protected function jsonSet($params = [],$message = null)
		{
			if (!$message) {
				$message = $this->statusCodeDefaultMessages[$this->statusCode];
			}

			$jsonData = [
				'status' => $this->statusCode,
				'message' => $message,
			];

			if (!empty($params)){
				$jsonData['results'] = $params;
			}
			echo json_encode($jsonData);
			$this->__addHeader();
			return;
		}

		/**
		 *
		 */
		private function __addHeader()
		{
			http_response_code($this->statusCode);
			header("Content-Type: application/json; charset=utf-8");
		}
	}