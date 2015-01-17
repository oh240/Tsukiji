<?php
	namespace Tsukiji\libs;

	/**
	 * Created by PhpStorm.
	 * User: nick
	 * Date: 15/01/02
	 * Time: 14:21
	 */

	class util {
		/**
		 * @param $string
		 * @param string $type
		 * @return bool|string
		 */
		public static function escape($string, $type = "html") {
			switch ($type) {
				case "html":
					return htmlspecialchars($string);
				default:
					return false;
			}
		}

		public static function debug($params)
		{
			echo '<pre>';
				var_dump($params);
			echo '</pre>';
		}
	}