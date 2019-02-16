<?php
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();
	
	class AUTH {


		public function isAdminLogin(){
			$timeout_duration = 1800;
			$time = $_SERVER['REQUEST_TIME'];
			
			if (isset($_SESSION["isAdminLogin"]) ){
				if (isset($_SESSION['ADMIN_LOGIN_TIME']) && 
				   ($time - $_SESSION['ADMIN_LOGIN_TIME']) > $timeout_duration) {
				    session_unset();
				    session_destroy();
				    session_start();
				    header("Location: /admin/login");
				}else {
					$_SESSION['ADMIN_LOGIN_TIME'] = $time;
				}
			}else {
				header("Location: /admin/login");
			}
		}
	}