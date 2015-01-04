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
		public $httpCode;
		public $params;
		protected $json;
		protected $debugLevel;

		/**
		 *
		 */
		public function __construct()
		{
			//HTTPCODEのデフォルトに200をセット
			$this->httpCode = 200;
		}

		public function set(){}



	}