<?php
	require_once __DIR__ . "/../Traits/DatabaseAPI.php";
	require_once __DIR__ . "/../Traits/Utils.php";

	/**
		All Connections to the database happends here;
		All Function might and might not accept params;

	*/

	class StudentController {
		use DatabaseModel;
		use Utils;

		public static function getStudentInfo(){
			return DatabaseModel::getStudentInfo();
		}

		public static function getStudentResults(){
			return DatabaseModel::getStudentResults();
		}

		public static function registerStudent($data){
			$params = ["username", "password", "firstname", "lastname", "age", "gender"];
			
			$isValidParam = Utils::issetParam($params, $data);

			if ( $isValidParam ){
				$data["username"] = trim(strip_tags($data["username"]));
				$data["password"] = md5($data["password"]);
				$data["firstname"] = trim(strip_tags($data["firstname"]));
				$data["lastname"] = trim(strip_tags($data["lastname"]));
				$data["age"] = trim(strip_tags($data["age"]));
				$data["gender"] = trim(strip_tags($data["gender"]));

				$save_response = DatabaseModel::registerStudent($data);

				if ( $save_response ){
					$response["status"] = 200;
	                $response["message"] = "Registered successfully";
					return Utils::sendResponse(200, $response);

				}else{
					$response["status"] = 403;
	                $response["message"] = "There was an error creating your account please contact Head Master";
					return Utils::sendResponse(403, $response);
				}
				


			}
			else{
				$response["status"] = 400;
                $response["message"] = "Invalid or Bad Data";
				return Utils::sendResponse(400, $response);
			}
		}

		public static function getCourseAmount(){
			return DatabaseModel::getCourseAmount();
		}

		public function getPaymentHistory(){
			return DatabaseModel::getPaymentHistory();
		}

		public function updateStudentPaidStatus($data){
			return DatabaseModel::updateStudentPaidStatus($data);
		}

		public function checkPaymentStatus(){
			return DatabaseModel::checkPaymentStatus();
		}







		/* THIS IS THE GRADE COLOURS WHICH SHOWS THE GRADES */

		public function getGradeColor($grade){

			if ( $grade == "A1" ){
	         	return '<span class="badge badge-success">A1</span>';
	         }
	         else if (  $grade == "B3" ){
	         	return '<span class="badge badge-info">B3</span>';
	         }
	         else if (  $grade == "C5" ){
	         	return '<span class="badge badge-warning"i>C5</span>';
	         } 
		}

		public function getGradeColorCode($grade){
			if ( $grade == "A1" ){
	         	return '#3ff90d ';
	         }
	         else if (  $grade == "B3" ){
	         	return '#0df9bc ';
	         }
	         else if (  $grade == "C5" ){
	         	return '#ff0202  ';
	         } 
		}

		







	}

