<?php
	
	/*
	*	Model for Users
	*/
	
	class Model_users extends MY_Model{

		const DB_TABLE = "Users";
		const DB_TABLE_PK = "idUsers";

		public $idUsers;
		public $email;
		public $username;
		public $password;
		public $type;
		//public $Ratings_idRatings;

		public function __construct()
		{
			parent::__construct();
		}

		function getUsers(){
			$query = $this->db->query('SELECT * FROM users');

			if($query->num_rows() > 0) {
				return $query->result();
			} else{
				return NULL;
			}
		}


	}