<?php
	namespace Tsukiji\libs;

	/**
	 * Created by PhpStorm.
	 * User: nick
	 * Date: 15/01/04
	 * Time: 10:02
	 */


	class router {

		protected $routerController;
		protected $routerAction;

		private static $routes = [];

		//route.phpの内容を取得する
		public static function add($routeParams = null) {
			//routes Validations
			self::$routes[] = $routeParams;
		}

		/**
		 * 自動でRoutingされるデフォルト値を設定します。
		 * @param $controller
		 * @return array
		 */
		public static function addBasicRoutes($controllerName = null) {

			if (!$controllerName) {
				return false;
			}

			$basicRoutes = [
				"/{$controllerName}" => [
					"GET" => [
						"controller" => $controllerName,
						'action' => "index"
					],
					"POST" => [
						"controller" => $controllerName,
						'action' => "create"
					],
				],
				"/{$controllerName}/@id" => [
					"GET" => [
						"controller" => $controllerName,
						'action' => "show"
					],
					"POST" => [
						"controller" => $controllerName,
						'action' => "update"
					],
					"PUT" => [
						"controller" => $controllerName,
						'action' => "update"
					],
					"DELETE" => [
						"controller" => $controllerName,
						'action' => "delete"
					],
				],
			];

			self::$routes[] = $basicRoutes;
		}

		/**
		 * @param null $requestURI
		 * @param string $httpMethod
		 * @return array|bool
		 * @todo リファクタリング・phpunitテスト
		 */
		public static function loadRouteConfig($requestURI = null, $httpMethod = "GET") {

			$requestURI = rtrim($requestURI, '/');

			//ユーザー設定値の読み出し
			$setRoutes = self::$routes;


			foreach ($setRoutes as $setRoute){

				$compiledRoutes = [];

				foreach ($setRoute as $url => $params) {
					$tokens = explode('/', ltrim($url, '/'));
					foreach ($tokens as $tokenKey => $token) {
						if (stripos($token, '@') === 0) {
							$name = substr($token, 1);
							$token = '(?P<' . $name . '>[^/]+)';
						}
						$tokens[$tokenKey] = $token;
					}
					$pattern = '/' . implode('/', $tokens);
					$compiledRoutes[$pattern] = $params;
				}

				foreach ($compiledRoutes as $pattern => $params) {
					if (preg_match('#^' . $pattern . "$#", $requestURI, $matches)) {
						if (isset($params[$httpMethod])) {
							return [
								"controller" => $params[$httpMethod]['controller'],
								"action" => $params[$httpMethod]['action'],
								'params' => $matches,
							];
						} else {
							return false;
						}
					}
				}

			}
			//例外を投げるようにする
			return false;
		}

	}
