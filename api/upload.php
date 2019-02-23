<?php

	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();

	include __DIR__ . "/Traits/db_connect.php";


	// You need to add server side validation and better error handling here

	$data = array();

	if(isset($_GET['files']))
	{  
	    $error = false;
	    $files = array();

	    $uploaddir = '../pages/portal/assets/faces/';
	    foreach($_FILES as $file)
	    {
	    	if ( substr($file['type'], 0, 5) == "image" ){

	    		$filepath = $uploaddir .basename(date('Y_M_D_h_m_a') . $file['name']);
		        if(move_uploaded_file($file['tmp_name'], $filepath))
		        {
		        	global $conn;
		        	$user_id = $_SESSION["student_id"];

		        	$sql = "UPDATE `students` SET `profile_image` = :filepath WHERE `id` = :user_id";
		        	$stmt = $conn->prepare($sql);
		        	$stmt->bindParam(":filepath", $filepath, PDO::PARAM_STR);
		        	$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		        	$stmt->execute();

		        	$_SESSION['profile'] = $filepath;

		        	
		            // $files[] = $uploaddir .$file['name'];
		        }
		        else
		        {
		        	http_response_code(400);
		            $error = true;
		        }
	    	}
	    	else{
	    		$error = true;
	    		http_response_code(400);

	    	}
	    	
	    }
	    $data = ($error) ? array('error' => 'There was an error uploading your files') : true;
	}
	else
	{
	    $data = array('error' => 'Invalid Request');
	}

	echo json_encode($data);