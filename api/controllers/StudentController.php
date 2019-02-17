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

