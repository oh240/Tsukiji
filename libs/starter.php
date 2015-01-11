<?php
	namespace Tsukiji\libs;

	use Tsukiji\config\route;

	define("DEFAULT_ACTION", 'index');

	class starter {
		private $controllerName;
		private $actionName;
		private $httpMethod;
		private $query;
		private $params;

		public function dispatch() {

			$requestURI = ltrim($_SERVER['REQUEST_URI']);

			//get paramsがセットされている状態
			$parse_url = parse_url($requestURI);
			$requestURI = $parse_url['path'];

			//GETパラメーターのセット
			if (!empty($_GET)){
				//paramsに各種Getパラメーターをセットする
				$this->query = $parse_url['query'];
			}

			$this->httpMethod = $_SERVER['REQUEST_METHOD'];

			//requestURIからController名Action名を取得する
			$params = router::loadRouteConfig($requestURI,$this->httpMethod);

			//add underscore
			$this->controllerName = $params['controller'].'_';
			$this->actionName = $params['action'];

			if (!empty($params['params'])){
				array_shift($params['params']);
				$this->params = $params['params'];
			} else {
				$this->params = "";
			}

			$controllerFilePath = "controllers/";
			$controllerFileName = $controllerFilePath . $this->controllerName .'controller.php';

			try {
				//ファイルの存在確認
				if (file_exists($controllerFileName)){
					//ControllerFileを読み込む
					require_once($controllerFileName);
				} else {
					//コントローラーが無いときの例外を投げる
					throw new \Exception("Not Found {$this->controllerName}controller.php");
				}

				//インスタンスの生成
				$controllerClassName = $this->controllerName.'controller';
				$controllerInstance = new $controllerClassName();
				$controllerInstance->controllerName = $this->controllerName;
				$controllerInstance->actionName = $this->actionName;

				if (method_exists($controllerInstance,$controllerInstance->actionName)){

					//Controller Params Set
					$controllerInstance->httpMethod = $this->httpMethod;
					$controllerInstance->params = $params['params'];
					$controllerInstance->getQuery = $_GET;
					if(isset($_POST)){
						$controllerInstance->receiveData = $_POST;
					}

					$controllerInstance->{$controllerInstance->actionName}();

				} else {
					throw new \Exception("Not Found \"{$controllerInstance->actionName}\" Method in {$controllerInstance->controllerName}controller.php");
				}

			} catch(\Exception $e) {
				//Error時の処理
				echo $e->getMessage();
			}
		}
	}
