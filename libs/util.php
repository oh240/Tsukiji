<?php
	namespace pwaf\libs;
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/01/02
 * Time: 14:21
 */

class util
{
	public static function escape($string,$type = "html")
	{
		switch ($type) {
			case "html":
				return htmlspecialchars($string);
			default:
				return false;
		}
	}

	public static function isNumeric($string)
	{

	}
}