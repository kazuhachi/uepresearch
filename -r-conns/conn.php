<?php    

	class Connection{
		public $hostname = null;
		public $username = null;
		public $password = null;
		public $database = null;

		public function crede_v(){
			$this -> hostname = "localhost";
			$this -> username = "viewer";
			$this -> password = "Fiom9yrxnBFZpe8B";
			$this -> database = "uep_research";
		}

		function crede_au(){
			$this -> hostname = "localhost";
			$this -> username = "authenticator";
			$this -> password = "nDIqxBDV1WlZhEmw";
			$this -> database = "uep_research";
		}

		function crede_mod(){
			$this -> hostname = "localhost";
			$this -> username = "moderator";
			$this -> password = "lzJ1HE8H02EeQKIh";
			$this -> database = "uep_research";
		}

		public function crede_ad(){
			$this -> hostname  = "localhost";
			$this -> username = "administrator";
			$this -> password = "RMIyh83jfh8v3lOw";
			$this -> database = "uep_research";
		}


		function connect(){
			$conn = mysqli_connect( $this -> hostname , $this -> username, $this -> password, $this -> database)or die("error connection");
			return $conn;
		}

		function connectByRole($role = null){
			if ($role == null) return;

			if ($role == "Administrator"){
				$this -> crede_ad();
			}
			if ($role == "Moderator"){
				$this -> crede_mod();
			}

			$conn = $this -> connect();
			return $conn;
		}

	}

?>