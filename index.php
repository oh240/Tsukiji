
<?php
		use \pwaf\libs\starter;

		//autoLoaderを頑張って作成する

		/*config*/
		//	require_once('../config.php');

		/*database*/
		//	require_once('../database.php');

		//routes.phpの読み込み
		require_once('config/route.php');
		require_once('libs/util.php');
		require_once('libs/router.php');
		require_once('libs/controller.php');
		require_once('libs/json.php');
		require_once('libs/starter.php');

		//dispatcherの実行
		$Starter = new starter();
		$Starter->dispatch();
