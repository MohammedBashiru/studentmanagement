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

				$user = DatabaseModel::loginStudent($username, $password);
				if ( $user )
				{

					if ($user['status'] == 1) 
					{
						$time = $_SERVER['REQUEST_TIME'];
	 					$_SESSION["student_id"] = $user["id"];
	 					$_SESSION["course_id"] = $user["course_id"];
	 					$_SESSION["username"] = $user["username"];
	 					$_SESSION["profile"] = $user["profile_image"];
	 					$_SESSION["full_name"] = $user["first_name"] . " " . $user["last_name"];
	 					$_SESSION["isStudentLogin"] = true;
	 					$_SESSION['LOGIN_TIME'] = $time;

						$response["status"] = 200;
		                $response["message"] = "Login successful";
						return Utils::sendResponse(200, $response);
					}
					else
					{
						$response["status"] = 403;
		                $response["message"] = "Your account is not yet active. Please contact the HeadMaster";
						return Utils::sendResponse(403, $response);
					}
					
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