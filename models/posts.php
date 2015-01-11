<?php
	namespace Tsukiji\models;

	use \Illuminate\Database\Eloquent\Model as Model;

	class Posts extends Model {
		protected $table = "posts";
		public $timestamps = false;
		protected $guarded = ['id'];
	}
