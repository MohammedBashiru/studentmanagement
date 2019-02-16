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
                      <h4 class="card-title">Resources Download Page</h4>
                      <p class="card-description">
                        Please find below available resources to download...
                      </p>
                      <div class="table-responsive">
	                    <table class="table table-bordered table-hover">
	                      <thead>
	                        <tr>
	                          <th>
	                            #
	                          </th>
	                          <th>
	                            Title
	                          </th>
	                          <th>
	                            Information
	                          </th>
	                          <th>
	                            Download
	                          </th>
	                          <th>
	                            Added Date
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
	                            <button type="button" class="btn btn-primary">Download</button>
	                          </td>
	                          <td>
	                            May 15, 2015
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



