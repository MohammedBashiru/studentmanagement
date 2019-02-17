<?php

	require "db_connect.php";

	trait DatabaseModel {

		public function loginStudent($username, $password) {
			global $conn;

			$sql = "SELECT * FROM `students` WHERE `username` = :username AND `password` = :password ";
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
			$status = 1;

			$sql = "INSERT INTO `students` ( username, password, first_name, last_name, gender, age, status ) VALUES ( :username, :password, :firstname, :lastname, :age, :gender, :status)";

			$stmt = $conn->prepare($sql);
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

			$response = $stmt->fetchAll();

			return $response;
		}
	}