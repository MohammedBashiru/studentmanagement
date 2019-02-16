<?php
	class DB 
	{

		public static function db_connect() {
			$conn = null;
			$host = "localhost";
			$user = "std_db_user";
			$pass = "64t41MrxEOakNtQB";
			$db = "std_management";
			try {
				$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
			return $conn;
		}

	}

	$conn = DB::db_connect();