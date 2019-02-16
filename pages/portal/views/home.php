<?php 
	// if(!isset($_SESSION)){ 
	//     session_start();
	// } 
	// ob_start();

	// require "../auth/auth.php"; 
	// $auth = new AUTH();
	// $auth->isLogin();

	include "../includes/header.php";
	include "../includes/top-bar.php";
	include "../includes/side-bar.php";
?>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Terminal Report</h4>
                      <p class="card-description">
                        Please find below available terminal report
                      </p>
                      <div class="table-responsive">
	                    <table class="table table-bordered table-hover">
	                      <thead>
	                        <tr>
	                          <th>#</th>
	                          <th>Course / Subject</th>
	                          <th>Test Score (30%)</th>
	                          <th>Exam Score (70%)</th>
	                          <th>Total (100%)</th>
	                          <th>Grade</th>
	                          <th>Term</th>
	                          <th>Year</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        <tr>
	                          <td></td>
	                          <td></td>
	                          <td></td>
	                          <td></td>
	                          <td></td>
	                          <td></td>
	                          <td></td>
	                          <td></td>
	                        </tr>
	                      </tbody>
	                    </table>
	                  </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
	    

<?php include "../includes/footer.php"; ?>