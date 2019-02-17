<?php
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();
	
	session_unset();
    session_destroy();
    session_start();
    header("Location: /login");