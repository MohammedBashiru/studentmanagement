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
                        <form action="../../../api/upload.php" id="uploadForm" method="post" enctype="multipart/form-data" >
                          <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control" name="file" id="picture">
                          </div>
                          <button>Send</button>
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
    var file = $("#picture");
    var profileForm = $("#uploadForm");

    console.log(profileForm);
    

    var form = new FormData();
    form.append('file', file);

    // var formData = new FormData();

    // formData.append("username", "Groucho");
    // formData.append("accountnum", 123456); // number 123456 is immediately converted to a string "123456"

    // // HTML file input, chosen by user
    // formData.append("userfile", fileInputElement.files[0]);

    // // JavaScript file-like object
    // var content = '<a id="a"><b id="b">hey!</b></a>'; // the body of the new file...
    // var blob = new Blob([content], { type: "text/xml"});

    // formData.append("webmasterfile", blob);

    // var request = new XMLHttpRequest();
    // request.open("POST", "http://foo.com/submitform.php");
    // request.send(formData);

    $.ajax({

      url: '../../../api/upload.php',
      method: 'post',
      data: profileForm,
      contentType: "multipart/form-data",
      // processData: false,
      // contentType: false,
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



