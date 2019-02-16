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
                      <div class="table-responsive">
	                    <table class="table table-bordered table-hover">
	                      <thead>
	                        <tr>
	                          <th>
	                            #
	                          </th>
	                          <th>
	                            Course
	                          </th>
	                          <th>
	                            Amount
	                          </th>
	                          <th>
	                            Date
	                          </th>
	                          <th>
	                            Status
	                          </th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        <tr>
	                          <td>
	                            1
	                          </td>
	                          <td>
	                            Herman Beck
	                          </td>
	                          <td>
	                            Photoshop
	                          </td>
	                          <td>
	                           May 15, 2015
	                          </td>
	                          <td>
	                            <label class="badge badge-danger">Pending</label>
	                          </td>
	                        </tr>
	                      </tbody>
	                    </table>
	                  </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>

		<!-- include jQuery -->
<?php include "../includes/footer.php"; ?>



