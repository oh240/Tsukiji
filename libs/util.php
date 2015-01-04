<?php
	namespace pwaf\libs;

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

		/**
		 * @param $string
		 */
//		public static function isNumeric($string) {
//
//		}

		/**
		 * @param array $array
		 * @return String
		 */
//		public static function arrayFirstKey($array) {
//			$name = key($array);
//			return $name;
//		}
	}