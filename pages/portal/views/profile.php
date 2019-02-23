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
    <link rel="stylesheet" href="../pages/portal/assets/css/sweetalert2.min.css">
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
                            <input type="file" class="form-control" name="file" id="profile_picture">
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
<script src="../pages/portal/assets/js/sweetalert2.min.js"></script>


<script>

 $(document).ready( function(){


    var files = [];

    // Add events
    $('#profile_picture').on('change', prepareUpload);

    // Grab the files and set them to our variable
    function prepareUpload(event)
    {
      files = event.target.files;
    }

    $('#saveImageBtn').on('click', uploadFiles);

    // Catch the form submit and upload the files
    function uploadFiles(event)
    {
      if ( files.length ){
        event.preventDefault();
        event.stopPropagation(); // Stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: '../../../api/upload.php?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    // console.log("we did it ", data)
                    // submitForm(event, data);
                    Swal.fire({
                      title: 'Success',
                      text: "Image Uploaded Successful",
                      type: 'success',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Ok'
                    }).then((result) => {
                      if (result.value) {
                        location.href = "/profile";
                      }
                    })
                    
                }
                else
                {
                    // Handle errors here
                    // console.log('ERRORS: ' + data.error);
                    showErrorAlert("There was an error uploading your file")
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                showErrorAlert("There was an error uploading your file")
                // console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
      }
      else{
        event.preventDefault();
        showErrorAlert("Please select an image to upload")
      }
    }

    function showErrorAlert(msg){
        swal({
          type : 'error',
        title: 'Error Processing...',
        text: msg,
        animation: false,
        customClass: 'animated tada'
      });
      }

      function showSuccessAlert(msg){
        swal({
          type : 'success',
        title: 'Updated Successful.',
        text: msg,
        animation: false,
        customClass: 'animated tada'
      });
      }








 });
</script>



