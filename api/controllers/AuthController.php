<?php
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();
	
	require_once __DIR__ . "/../Traits/DatabaseAPI.php";
	require_once __DIR__ . "/../Traits/Utils.php";

	class AuthController {
		use Utils;
		use DatabaseModel;

		public static function loginStudent($data){
			$params = ["username", "password"];

			$issetParam = Utils::issetParam($params, $data);

			if ( $issetParam ){
				// Validate Information
				$username = trim(strip_tags($data["username"]));
				$password = md5($data["password"]);

				$results = DatabaseModel::loginStudent($username, $password);
				if ( $results ){

					$time = $_SERVER['REQUEST_TIME'];
 					$_SESSION["student_id"] = $results["id"];
 					$_SESSION["username"] = $results["email"];
 					$_SESSION["full_name"] = $results["first_name"] . " " . $results["last_name"];
 					$_SESSION["isStudentLogin"] = true;
 					$_SESSION['LOGIN_TIME'] = $time;

					$response["status"] = 200;
	                $response["message"] = "Login successful";
					return Utils::sendResponse(200, $response);
				}
				else {
					$response["status"] = 403;
	                $response["message"] = "Invalid username or password";
					return Utils::sendResponse(403, $response);
				}
			}
			else {
				$response["status"] = 400;
                $response["message"] = "Invalid or Bad Data";
				return Utils::sendResponse(400, $response);
				
			}
		}


	}