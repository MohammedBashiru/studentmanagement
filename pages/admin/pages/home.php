<?php 
	if(!isset($_SESSION)){ 
	    session_start();
	} 
	ob_start();

	require "../auth/auth.php"; 
	$auth = new AUTH();
	$auth->isAdminLogin();

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
                      <h4 class="card-title">Students / Users</h4>
                      <p class="card-description">
                        Please find below your users / students
                      </p>
                      <div class="table-responsive">
	                    <table class="table table-bordered table-hover">
	                      <thead>
	                        <tr>
	                          <th>
	                            #
	                          </th>
	                          <th>
	                            Full Name
	                          </th>
	                          <th>
	                            Email
	                          </th>
	                          <th>
	                            Phone
	                          </th>
	                          <th>
	                            Location
	                          </th>
	                          <th>
	                            Send SMS
	                          </th>
	                          <th>
	                            Action
	                          </th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        <tr>
	                          <td>
	                            1
	                          </td>
	                          <td>
	                           
	                          </td>
	                          <td>
	                            
	                          </td>
	                          <td>
	                           
	                          </td>
	                          <td>
	                            
	                          </td>
	                          <td>
	                            <a href="#" clas="btn btn-primary" type="button" data-toggle="modal" data-target="#smsModal">
		                      		<i class="mdi mdi-comment" style="color: green"></i>
		                      		Send SMS
		                      	</a>
	                          </td>
	                          <td>
	                            <a href="/edit-user/" clas="btn btn-info btn-circle" type="button">
	                            	<i class="mdi mdi-pen"></i>
	                            </a>
		                      		&nbsp;&nbsp;|&nbsp;&nbsp;
		                      	<a href="#" clas="btn btn-circle" type="button" data-toggle="modal" data-target="#deleteModal">
		                      		<i class="mdi mdi-delete" style="color: red"></i>
		                      	</a>
	                          </td>
	                        </tr>
	                        <!-- SMS Modal-->
							    <div class="modal fade" id="smsModal<?= $user["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							      <div class="modal-dialog" role="document">
							        <div class="modal-content">
							          <div class="modal-header">
							            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
							            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							              <span aria-hidden="true">×</span>
							            </button>
							          </div>
							          <div class="modal-body">Click on delete button below if you are ready to delete.</div>
							          <div class="modal-footer">
							            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							            <a class="btn btn-danger" href="/delete-user/<?= $user["id"] ?>">Delete</a>
							          </div>
							        </div>
							      </div>
							    </div>

							<!-- Delete Modal-->
							    <div class="modal fade" id="deleteModal<?= $user["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							      <div class="modal-dialog" role="document">
							        <div class="modal-content">
							          <div class="modal-header">
							            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
							            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							              <span aria-hidden="true">×</span>
							            </button>
							          </div>
							          <div class="modal-body">Click on delete button below if you are ready to delete.</div>
							          <div class="modal-footer">
							            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							            <a class="btn btn-danger" href="/delete-user/<?= $user["id"] ?>">Delete</a>
							          </div>
							        </div>
							      </div>
							    </div>
	                      </tbody>
	                    </table>
	                  </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
	    

<?php include "../includes/footer.php"; ?>