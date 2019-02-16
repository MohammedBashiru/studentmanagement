<?php

	trait Utils {

		public function issetParam($params, $query){
			$missing_params = array_diff( $params, array_keys($query) );
			$empty_vals = array_filter( $query, function($val) {
				return (is_array($val)) ? !$val : trim($val) === "" || is_null($val);
			});
			if ( !$missing_params && !$empty_vals ) {
				return true;
			}
			else { return false; }
		}


		public function sendResponse($code, $data){
            http_response_code($code);
			return $data;
		}
		/**
		* Returns formatted date
		*/
		public function getFormattedDate($dateStr){
			return date("F j, Y", strtotime($dateStr));
		}

		/**
		* Returns formatted for Edit Page
		*/
		public function getDayMonthDate($dateStr){
			return date("m/d/Y", strtotime($dateStr));
		}

		/**
		* Returns day of the week
		*/
		public function getDayFromDate($dateStr){
			$daysArr = [
				"Sunday", 
				"Monday",
				"Tuesday", 
				"Wednesday",
				"Thursday", 
				"Friday",
				"Saturday", 
			];

			$dayofweek = date('w', strtotime($dateStr));

			return $daysArr[$dayofweek];
		}
	}