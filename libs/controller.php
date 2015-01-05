<?php
	namespace pwaf\libs;

	use pwaf\libs\json;
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
		//??
		public $receiveData;
		public $getQuery;
		public $httpMethod;
		public $controllerName;
		public $actionName;
		public $statusCode;
		public $params;
		protected $debugLevel;

		/**
		 *
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
		protected function jsonSet($params = [],$message)
		{
			$jsonData = [
				'status' => $this->statusCode,
				'message' => $message,
			];
			if (!empty($params)){
				$jsonData['results'] = $params;
			}
			echo json_encode($jsonData);
			return;
		}
	}