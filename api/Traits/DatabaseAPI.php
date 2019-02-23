<?php

	require "db_connect.php";

	trait DatabaseModel {

		public function loginStudent($username, $password) {
			global $conn;

			$sql = "SELECT * FROM `students` WHERE `username` = :username AND `password` = :password";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			$results = $stmt->fetch();

			return $results;

		}

		public function registerStudent($data){
			global $conn;

			$username = $data["username"];
			$password = $data["password"];
			$firstname = $data["firstname"];
			$lastname = $data["lastname"];
			$age = $data["age"];
			$gender = $data["gender"];
			$course_id = $data["course"];
			$status = 1;

			$sql = "INSERT INTO `students` ( course_id, username, password, first_name, last_name, gender, age, status ) VALUES ( :course_id, :username, :password, :firstname, :lastname, :age, :gender, :status)";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
			$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":age", $age, PDO::PARAM_INT);
			$stmt->bindParam(":status", $status, PDO::PARAM_INT);

			$stmt->execute();

			return true;



		}

		public function getStudentInfo(){
			global $conn;

			$student_id = $_SESSION['student_id'];
			$sql = "SELECT * FROM `students` WHERE id = :student_id ";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
			$stmt->execute();

			$response = $stmt->fetch();

			return $response;
		}

		public function getStudentResults(){
			global $conn;

			$student_id = $_SESSION['student_id'];
			$sql = "SELECT * FROM results Where student_id = :student_id ";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
			$stmt->execute();

			//Fetch all means fetch all records
			$response = $stmt->fetchAll();

			return $response;
		}

		public function getPaymentHistory(){
			global $conn;

			$student_id = $_SESSION['student_id'];
			$sql = "SELECT * FROM `payments` Where student_id = :student_id ";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
			$stmt->execute();

			//Fetch all means fetch all records
			$response = $stmt->fetchAll();

			return $response;
		}


		public function getCourseAmount(){
			global $conn;

			$course_id = $_SESSION['course_id'];

			$sql = "SELECT * FROM `course` Where id = :course_id ";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":course_id", $course_id, PDO::PARAM_INT);
			$stmt->execute();

			//Fetch means fetch first record
			$course = $stmt->fetch();

			//0558022661

			//Now Temporary Save The Payment Information
			$student_id = $_SESSION['student_id'];

			//Calling a static method in a trait refers with self:: keyword;
			$transaction_id = self::generationPaymentHash();
			$status = "pending";
			$amount = $course["amount"];
			$date = date('Y-m-d h:m:a');


			$sql_insert = "INSERT INTO `payments` (student_id, amount, payment_date, transaction_id, status) VALUES (:student_id, :amount, :payment_date, :transaction_id, :status)";

			$stmt = $conn->prepare($sql_insert);
			$stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
			$stmt->bindParam(":amount", $amount, PDO::PARAM_STR);
			$stmt->bindParam(":payment_date", $date);
			$stmt->bindParam(":transaction_id", $transaction_id, PDO::PARAM_STR);
			$stmt->bindParam(":status", $status, PDO::PARAM_STR);
			$stmt->execute();


			$results = ["amount" => $course["amount"], "order_id" => $transaction_id];


			return $results;
		}

		public function updateStudentPaidStatus($data){
			global $conn;

			//Now Temporary Save The Payment Information
			$student_id = $_SESSION['student_id'];
			$order_id = $data['order_id'];
			$paid = 1;

			//Update Students Table And Change `has_paid` to 1
			//Then Update Payment status as paid
			

			$sql = "UPDATE `students` SET `has_paid` = :paid WHERE `id` = :student_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
			$stmt->bindParam(":paid", $paid, PDO::PARAM_INT);
			$stmt->execute();

			//Update Payment Table now
			$paid = 'paid';
			$sql = "UPDATE `payments` SET `status` = :paid WHERE `transaction_id` = :order_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":order_id", $order_id, PDO::PARAM_STR);
			$stmt->bindParam(":paid", $paid, PDO::PARAM_STR);
			$stmt->execute();

			return true;

		}

		public function checkPaymentStatus(){
			global $conn;

			$student_id = $_SESSION['student_id'];
			$sql = "SELECT * FROM `students` Where id = :student_id ";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
			$stmt->execute();

			//Fetch all means fetch all records
			$student = $stmt->fetch();

			if ( $student["has_paid"] ){
				return true;
			}
			else {
				header("location: /payments");
			}
		}

		public function getCourses(){
			global $conn;

			$sql = "SELECT * FROM `course`";
			$stmt = $conn->prepare($sql);
			$stmt->execute();

			//Fetch all means fetch all records
			$response = $stmt->fetchAll();

			return $response;
		}

		public function generationPaymentHash(){
			$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
		    shuffle($seed); // probably optional since array_is randomized; this may be redundant
		    $rand = '';
		    foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
		    
		    return $rand;
		}
	}