<?php
	namespace pwaf\libs;

	use pwaf\config\route;

	define("DEFAULT_CONTROLLER",'users');
	define("DEFAULT_ACTION", 'index');

	class starter {
		private $controllerName;
		private $actionName;
		private $httpMethod;
		private $query;

		public function dispatch() {

			$requestURI = ltrim($_SERVER['REQUEST_URI']);

			//get paramsがセットされている状態
			$parse_url = parse_url($requestURI);
			$requestURI = $parse_url['path'];

			if (!empty($_GET)){
				//paramsに各種Getパラメーターをセットする
				$this->query = $parse_url['query'];
			}

			//requestURIからController名Action名を取得する
			$params = router::loadRouteConfig($requestURI);

			var_dump($params);

//			$this->controllerName = strtolower($params[0]);
//
//			if (isset($params[1])){
//				$this->actionName = $params[1];
//			} else {
//				$this->actionName = DEFAULT_ACTION;
//			}

			$this->httpMethod = $_SERVER['REQUEST_METHOD'];

			$controllerFilePath = "controllers/";
			$controllerFileName = $controllerFilePath . $this->controllerName .'controller.php';

//			try {
//				//ファイルの存在確認
//				if (file_exists($controllerFileName)){
//					//ControllerFileを読み込む
//					require_once($controllerFileName);
//				} else {
//					//コントローラーが無いときの例外を投げる
//					throw new Exception("Not Found {$this->controllerName}controller.php");
//				}
//
//				$controllerClassName = $this->controllerName.'controller';
//				//インスタンスの生成
//				$controllerInstance = new $controllerClassName();
//				$controllerInstance->controllerName = $this->controllerName;
//				$controllerInstance->actionName = $this->actionName;
//				$controllerInstance->httpMethod = $this->httpMethod;
//				$controllerInstance->query = $this->query;
//
//				if ($this->httpMethod !== 'GET'){
//					//GET
//				} else {
//					//POST,PUT, DELETE,
//					if(isset($_POST)){
//						$controllerInstance->receiveData = $_POST;
//					}
//				}
//
//				if (method_exists($controllerInstance,$this->actionName)){
//					//paramsが存在するとき...
//					if (true){
//						//実行
//						//echo
//						$controllerInstance->{$this->actionName}();
//					} else {
//						//paramsを引数にセットして実行
//					}
//				}
//
//			} catch(Exception $e) {
//				//Error時の処理
//				echo $e->getMessage();
//			}
		}

		public function genControllerInstance($controllerClassName)
		{
		}
	}
