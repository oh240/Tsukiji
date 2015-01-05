<?php
	namespace pwaf\models;
	use \Illuminate\Database\Eloquent\Model as Model;

	class Users extends Model {

		protected $table = "users";
		public $timestamp = false;

	}