<?php 
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();

	require "../auth/auth.php"; 
	$auth = new AUTH();
	$auth->isLogin();

	include "../includes/header.php";
	include "../includes/top-bar.php";
	include "../includes/side-bar.php";
?>
<!-- partial -->
	  <link rel="stylesheet" href="../pages/portal/assets/css/ycp.css">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Payment Logs</h4>
                      <p class="card-description">
                        Please find below your payment informations
                      </p>
                      <form class="forms-sample">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" class="form-control" name="full_name" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="phone" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Location</label>
                          <input type="text" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                          <label for="passwordField">Enter New Password</label>
                          <input type="Password" class="form-control" id="passwordField" placeholder="Enter new password here">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Change Password</button>
                        <a href="/portal" class="btn btn-light">Cancel</a>
                      </form>
	                  </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>

		<!-- include jQuery -->
<?php include "../includes/footer.php"; ?>



