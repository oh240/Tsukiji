<?php
	/**
	 * Created by PhpStorm.
	 * User: nick
	 * Date: 15/01/04
	 * Time: 10:02
	 */

	namespace pwaf\libs;

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

		public static function loadRouteConfig($requestURI = null, $httpMethod = "GET") {
			$setRoute = array_merge(route::$myRoute);
			//@が存在する場合は

			// RequeURIをキーとして配列を検索する
			if (array_key_exists($requestURI, $setRoute)) {

				//@存在しない場合
				$currentRoute = $setRoute[$requestURI];
				//対象のHTTPMETHODのにむけたActionの存在確認
				if ($currentRoute["actions"][$httpMethod]){
					return [
						"controller" => $currentRoute['controller'],
						"actions" => $currentRoute['actions'][$httpMethod]
					];
				}

				return "{$requestURI}存在しません";
			}
		}


		//
	}