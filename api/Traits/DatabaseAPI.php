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
	}