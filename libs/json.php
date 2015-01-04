<?php
	namespace pwaf\libs;
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/01/02
 * Time: 12:38
 */

/**
 * Class json
 */
class json
{

	/**
	 * @param int $httpCode
	 * @param array $params
	 */
	public function set($httpCode = 200,$params = [])
	{
		$params = [
			'code' => $httpCode,
		    'posts' => [
			    'Post' =>[
				    'id' =>1,
			        'name' => '名前'
			    ]
		    ]
		];
		$jsonData = json_encode($params);
		echo $jsonData;
	}
}