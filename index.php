
<?php
		//autoLoaderを頑張って作成する
		require 'vendor/autoload.php';

		use \Tsukiji\libs\starter;
		use \Tsukiji\config\DB_CONFIG;
		use Illuminate\Database\Capsule\Manager as Capsule;

		require_once('libs/util.php');
		require_once('libs/router.php');
		require_once('libs/controller.php');

		//routes.phpの読み込み
		require_once('config/route.php');
		require_once('config/config.php');
		require_once('config/db.php');

		require_once('libs/starter.php');
		require_once('models/posts.php');

		//DBDataの読み込み
		$capsel = new Capsule;
		$capsel->addConnection(DB_CONFIG::$config);
		$capsel->bootEloquent();

		//dispatcherの実行
		$Starter = new starter();
		$Starter->dispatch();
