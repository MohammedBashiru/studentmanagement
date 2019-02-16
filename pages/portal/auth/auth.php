<?php
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();
	
	class AUTH {


		public function isLogin(){
			$timeout_duration = 1800;
			$time = $_SERVER['REQUEST_TIME'];
			
			if (isset($_SESSION["isLogin"]) ){
				if (isset($_SESSION['LOGIN_TIME']) && 
				   ($time - $_SESSION['LOGIN_TIME']) > $timeout_duration) {
				    session_unset();
				    session_destroy();
				    session_start();
				    header("Location: /login");
				}else {
					$_SESSION['LOGIN_TIME'] = $time;
				}
			}else {
				header("Location: /login");
			}
		}
	}