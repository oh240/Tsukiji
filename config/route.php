<?php
	namespace pwaf\config;

	class route {
		public static $myRoute = [
			"/posts" => [
				"controller" => "posts",
				"actions" => [
					"GET" => "index",
					"POST" => "create",
				]
			],
		    "/posts/@id" => [
			    "controller" => "posts",
			    "id" => "numeric",
			    "actions" => [
				    //"HTTPMETHOD" => "ACTION"
				    "GET" => "view",
				    "POST" => "update",
				    "PUT" => "update",
				    "DELETE" => "delete",
			    ]
		    ],
			"/users" => [
				"controller" => "users",
				"actions" => [
					"GET" => "index",
					"POST" => "create",
				]
			],
			"/users/@id" => [
				"controller" => "users",
				"id" => "numeric",
				"actions" => [
					"GET" => "view",
					"POST" => "update",
					"PUT" => "update",
					"DELETE" => "delete",
				]
			],
		];
	}
