<?php 
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();

	require "../../../auth/auth.php"; 
	$auth = new Auth();
	$auth->isStudentLogin();

	include "../includes/header.php";
	include "../includes/top-bar.php";
	include "../includes/side-bar.php";

  include_once "../../../api/controllers/Controllers.php";
  
  $user = StudentController::getStudentInfo();

  // echo '<pre>';
  // var_dump($user);
  // echo '</pre>'; 

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
                      <!-- <form class="forms-sample"> -->
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" class="form-control" name="First Name" readonly="" value="<?php echo $user['first_name'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="Last Name" readonly="" value="<?php echo $user['last_name'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <input type="text" class="form-control" name="Gender" readonly="" value="<?php echo $user['gender'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Age</label>
                          <input type="number" class="form-control" name="Age" readonly="" value="<?php echo $user['age'] ?>">
                        </div>
                        <form action="../../../api/upload.php" id="uploadForm">
                          <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control" name="file" id="picture">
                          </div>
                        </form>
                        

                        <button type="button" class="btn btn-success mr-2" id="saveImageBtn">Save Image</button>
                        <a href="/portal" class="btn btn-light">Cancel</a>
                      <!-- </form> -->
	                  </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
		<!-- include jQuery -->
<?php include "../includes/footer.php"; ?>

 <script src="../pages/portal/assets/vendors/js/jquery.js"></script>
<script src="../pages/portal/assets/js/dropzone.js"></script>


<script>

 $(document).ready( function(){

  $("#saveImageBtn").on("click", function(){
    var formBody = $("#uploadForm");
    var form = new FormData(formBody);

    $.ajax({

      url: '../../../api/upload.php',
      method: 'post',
      data: form,
      contentType: "multipart/form-data",
      processData: false,
      contentType: false,
      success: function(data){
        console.log("success ", data)
      },
      error: function(e){
        console.log('Error occured with request ', e)
        // showErrorAlert(e.responseJSON.message)
      }

    })
  });







 });
</script>



