<?php
	namespace pwaf\libs;

	/**
	 * Created by PhpStorm.
	 * User: nick
	 * Date: 15/01/04
	 * Time: 10:02
	 */

	use pwaf\config\route;

	class router {

		protected $routerController;
		protected $routerAction;

		//route.phpの内容を取得する

		/**
		 * 自動でRoutingされるデフォルト値を設定します。
		 * @param $controller
		 * @return array
		 */
		private static function defaultRoutting($controller) {}

		/**
		 * @param null $requestURI
		 * @param string $httpMethod
		 * @return array|bool
		 * @todo リファクタリング・phpunitテスト
		 */
		public static function loadRouteConfig($requestURI = null, $httpMethod = "GET") {

			//ユーザー設定値の読み出し
			$setRoutes = route::$myRoute;

			//@が存在する場合は@部分を削る
			$compiledRoutes = [];
			foreach ($setRoutes as $url => $params){
				$tokens = explode('/',ltrim($url,'/'));
				foreach ($tokens as $tokenKey => $token){
					if (stripos($token,'@') === 0){
						$name = substr($token,1);
						//表示上の問題で特に運用上問題はなさそう。
						$token = '(?P<'. $name. '>[^/]+)';
					}
					$tokens[$tokenKey] = $token;
				}
				$pattern = '/'. implode('/',$tokens);
				$compiledRoutes[$pattern] = $params;
			}

			//TEST的にHTTPMethodを変更
			foreach ($compiledRoutes as $pattern => $params){
				if (preg_match('#^'.$pattern."$#",$requestURI,$matches)){
					if (isset($params[$httpMethod])){
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
			//例外を投げるようにする
			return false;
		}

	}
