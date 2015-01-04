<?php
	namespace pwaf\config;
	class route {
		public static $myRoute = [
			"/posts" => [
				"GET" => [
					"controller" => "posts",
					'action' => "index"
				],
				"POST" => [
					"controller" => "posts",
					'action' => "create"
				],
			],
			"/posts/@id" => [
				"GET" => [
					"controller" => "posts",
					'action' => "show"
				],
				"POST" => [
					"controller" => "posts",
					'action' => "update"
				],
			],
		];
	}
