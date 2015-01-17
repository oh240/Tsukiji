<?php

	use \Tsukiji\libs\router;

	router::addBasicRoutes("posts");
	//router::addBasicRoutes("users");

	router::add([
		"/users" => [
			"GET" => [
				"controller" => "users",
				'action' => "index"
			],
		],
		"/users/@id" => [
			"GET" => [
				"controller" => "users",
				'action' => "show"
			],
		],
	]);