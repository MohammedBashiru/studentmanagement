<?php

	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();
	
	class Auth {

		public $timeout_duration;
		public $time;

		function __construct(){

			$this->timeout_duration = 1800;
			$this->time = $_SERVER['REQUEST_TIME'];
			$this->name = "Kelving";
		}


		public function isStudentLogin(){
			
			if (isset($_SESSION["isStudentLogin"]) ){
				if (isset($_SESSION['LOGIN_TIME']) && 
				   ($this->time - $_SESSION['LOGIN_TIME']) > $this->timeout_duration) {
					echo $this->time . " <br>";
					echo $_SESSION['LOGIN_TIME'] . " <br>";
					echo $this->timeout_duration . " <br>";
					echo $this->time - $_SESSION['LOGIN_TIME'] . "<br>";

				    session_unset();
				    session_destroy();
				    session_start();
				    header("Location: /login");
				}else {
					$_SESSION['LOGIN_TIME'] = $this->time;
				}
			}else {
				header("Location: /login");
			}
		}


		 
	}

