
<?php
		use \pwaf\libs\starter;

		require('libs/starter.php');


		//autoLoaderを頑張って作成する

		/*config*/
		//	require_once('../config.php');

		/*database*/
		//	require_once('../database.php');

		require_once('config/route.php');

		/*controller model super class*/
		require_once('libs/router.php');

		//routes.phpの読み込み
		require_once('libs/controller.php');
		require_once('libs/json.php');


		//dispatcherの実行
		$Starter = new starter();
		$Starter->dispatch();
