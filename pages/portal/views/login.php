<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

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

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../pages/portal/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../pages/portal/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../pages/portal/assets/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="../pages/portal/assets/css/sweetalert2.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../pages/portal/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../pages/portal/assets/favicon.png" />
</head>

<body style="background-image: url(../pages/portal/assets/images/background1.jpg);">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="#">
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" id="password" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" id="submitBtn" type="button">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="/register" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © <?php echo date('Y') ?> Telvin. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../pages/portal/assets/vendors/js/jquery.js"></script>
  <script src="../pages/portal/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../pages/portal/assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../pages/portal/assets/js/off-canvas.js"></script>
  <script src="../pages/portal/assets/js/misc.js"></script>
  <script src="../pages/portal/assets/js/sweetalert2.min.js"></script>
  <!-- endinject -->

  <script>

  	$(document).ready(function(){
  		// alert("We are ready")
  		$("#submitBtn").on("click", function(){
  			const username = $("#username").val();
  			const password = $("#password").val();

  			if ( username == "" ){
  				showErrorAlert("Please enter username");
  				$("#username").focus();
  			}
  			else if (password == "" ){
  				showErrorAlert("Please enter Password");
  			}
  			else  {

  				//Converting data object to JSON string
  				//Before sending to server

  				const dataToBeSent = JSON.stringify({
  					action: 100,
  					data: {
  						username: username,
  						password: password
  					}
  				})

  				$.ajax({
  					url: '../../../api/request.php',
  					method: 'post',
  					data: dataToBeSent,
  					contentType: "application/json",
  					success: function(data){
  						location.href= "/";
  					},
  					error: function(e){
  						console.log('Error occured with request ', e.responseJSON.message)
  						showErrorAlert(e.responseJSON.message)
  					}
  				})
  			}
  		});



  		function showErrorAlert(msg){
  			Swal.fire({
  			  type : 'error',
			  title: 'Error Processing...',
			  text: msg,
			  animation: false,
			  customClass: 'animated tada'
			});
  		}
  	})

  </script>
</body>

</html>









