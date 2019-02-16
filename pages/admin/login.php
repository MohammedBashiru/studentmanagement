<?php 
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	include "../../includes/header.php"; 
	include "../../api/request.php";
	$api = new API();
  	$method = $_SERVER['REQUEST_METHOD'];

	$error = false;
	$msg = "";
	if ( $method == "POST" ) {
	    $process = $api->loginAdmin($_POST);
	    // var_dump($process);
	    if ( $process["status"] == "success" )
	    {
	      header("location: /admin");
	      // var_dump($process);
	    }else{
	      $error = true;
	      $msg = $process["message"];
	    }
	}


?>

	<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">



	  <nav class="navbar navbar-expand-lg site-navbar navbar-light bg-light" id="pb-navbar">

	    <div class="container">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <!-- <a class="navbar-brand" href="/">CALL ME PACMAN</a> -->
	      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample09">
	        <ul class="navbar-nav1">
	          <li class="nav-item"><a class="nav-link" href="/">Back Home</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>




	  <section class="site-hero" style="background-image: url(../assets/images/admin.jpg);" id="section-home" data-stellar-background-ratio="0.5">
	    <div class="container">
	      <center>
	      	<div class="col-md-6" style="margin-top: 30%">
		      	<form action="" class="site-form" method="POST">
			        <h3 class="text-center text-success" style="font-weight: bold;">Login To Management Portal</h3>
			        <?php if ($error) : ?>
			        	<p class="text-center" style="font-weight: bold; color: red">Error: <?php echo $msg; ?></p>
			        <?php endif; ?>
			        <div class="form-group">
			          <input type="text" class="form-control px-3 py-4" name="username" required placeholder="Enter username">
			        </div>
			        <div class="form-group">
			          <input type="password" class="form-control px-3 py-4" name="password" required placeholder="Password">
			        </div>
			        <div class="form-group">
			          <input type="submit" class="btn btn-primary  px-4 py-3" value="Login">
			        </div>
			      </form>
		      </div>
	      </center>
      <?php include "../includes/footer.php"; ?>
    </div>
  </section> <!-- section -->









