<?php
	namespace pwaf\config;
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 15/01/04
 * Time: 18:28
 */

class DB_CONFIG {
	 public static $config = [
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'pwaf',
		'username'  => 'root',
		'password'  => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	];
}