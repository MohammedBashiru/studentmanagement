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
  
  	//We are instatiating Student Controler Class
  	//So we can access its methods and properties
  	$controller = new StudentController();

  	//Get Payment History Method From Student Controller
  	//This will call the db and fetch student's payment history
  	$payments = $controller->getPaymentHistory();

?>
<!-- partial -->
	  <link rel="stylesheet" href="../pages/portal/assets/css/sweetalert2.min.css">
	  <link rel="stylesheet" href="../pages/portal/assets/css/ycp.css">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row flex-grow">
          	<div class="col-12 margin-bottom-26">
				<h5>Please choose payment method</h5>
	            <table>
	            	<tr>
	            		<td>
	            			<img src="../pages/portal/assets/images/mtn.jpg" alt="" class="payment-img" style="display: block">
	            			<button class="btn btn-warning" style="margin-top: 20px" data-toggle="modal" data-target="#mobileMoney">Select</button>
	            		</td>
	            		<td><span style="margin-right: 50px"></span></td>
	            		<td>
	            			<img src="../pages/portal/assets/images/bank.png" alt="" class="payment-img" style="display: block">
	            			<button class="btn btn-danger" style="margin-top: 20px" data-toggle="modal" data-target="#bankPayment">Select</button>
	            		</td>
	            	</tr>
	            </table>
		             
              </div>
          	</div>
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
	                    <?php if ( $payments ) : ?>
	                      <thead>
	                        <tr>
	                          <th>
	                            #
	                          </th>
	                          <th>
	                            Order ID
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
	                      	<?php foreach ($payments as $payment) : ?>
	                        <tr>
	                          <td>
	                            <?= $payment["id"] ?>
	                          </td>
	                          <td>
	                            <?= $payment["transaction_id"] ?>
	                          </td>
	                          <td>
	                             <?= 'GH¢ ' . number_format($payment["amount"], 2); ?>
	                          </td>
	                          <td>
	                            <?= substr($payment["date"], 0, 10) ?>
	                          </td>
	                          <td>
	                          	<?php if ( $payment["status"] == "paid" ) : ?>
	                            	<label class="badge badge-success">Paid</label>
	                            <?php else : ?>
									<label class="badge badge-warning">Pending</label>
	                         	<?php endif; ?>
	                          </td>
	                        </tr>
	                       <?php endforeach; ?>
	                        </tbody>
	                       <?php else : ?>

							<h3>No payment made</h3>

	                   		<?php endif; ?>
	                      
	                    </table>
	                  </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>

        <!-- Money Money Modal -->
		<div class="modal" tabindex="-1" role="dialog" id="mobileMoney">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Choose Payment Network</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="">
		        	<div class="form-group">
		        		<div class="input-radio-group">
		        			<label class="radio-inline">
		        				<input type="radio" value="mtn" name="optradio" checked>Mtn
		        				<img src="../pages/portal/assets/images/mtn.jpg" alt="" style="width: 50px">
		        			</label>
							<label class="radio-inline">
								<input type="radio" value="airtel" name="optradio" >Airtel
								<img src="../pages/portal/assets/images/airtel.jpg" alt="" style="width: 50px">
							</label>
							<label class="radio-inline">
								<input type="radio" value="vodafone" name="optradio" disabled>Vodafone
								<img src="../pages/portal/assets/images/vodafone.jpg" alt="" style="width: 50px">
							</label> 
		        		</div>
		        	</div>
		        	<div class="form-group">
		        		<input type="text" placeholder="enter your phone number" value="" id="phoneNumber">
		        	</div>
		        	<div class="form-group" id="mtnProccess" style="display: none">
		        		<h5>Please follow this instruction to approve payment</h5>
		        		<ul class="list-group">
						  <li class="list-group-item">Dial <strong>*170#</strong></li>
						  <li class="list-group-item">Select Option 7 (Wallet)</li>
						  <li class="list-group-item">Select 3 My Approvals</li>
						  <li class="list-group-item">Enter Mobile Money Pin</li>
						  <li class="list-group-item">Select Transaction From The List</li>
						  <li class="list-group-item">Confirm The Transaction</li>
						</ul>
		        	</div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" id="proceedPayment">Proceed to payment</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		 <!-- Bank Payment Modal -->
		<div class="modal" tabindex="-1" role="dialog" id="bankPayment">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Please Find Bank Details Below</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        	<p><strong>Bank Name : </strong> Ecobank</p>
		        	<p><strong>Account Number : </strong> 9047899000121</p>
		        	<p><strong>Account Type : </strong> Current</p>
		        	<p><strong>Routing Number : </strong> 536523342</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- include jQuery -->
<?php include "../includes/footer.php"; ?>
<script src="../pages/portal/assets/js/sweetalert2.min.js"></script>

<script>

	$(document).ready(function(){

		$("#proceedPayment").on("click", proceedPayment);

		//Creating global variables
		//Tobe accessed from every where in page;

		var phoneNumber;
		var amount;
		var network;
		var recipient_number = '0558022661';
		var option;
		var orderID;
		var apikey = '03ad6663e6589c30002bc002217a8b2e869b623f';


		function proceedPayment(){

			//Get All Radio Button With Name optradio
			const allPaymentOptions = $('input[name="optradio"]');

			//Loop through all radio buttons with option above & is checked
			//Then get its value

			allPaymentOptions.each(function(){
				//(this) refers to each object from the iteration.
				if( $(this).is(":checked") ){
					network = $(this).val()

					if ( network == "mtn" ){
						option = "rmtm";
					}else{
						option = "ratm";
					}
				}
			});

			phoneNumber =  $("#phoneNumber").val();

			if ( phoneNumber ==  "" ){
				showErrorAlert("Please enter phone number")
			}else if ( phoneNumber.length < 10 ){
				showErrorAlert("Please enter full phone number. Must be 10")
			}else if ( phoneNumber.substring(0, 1) != "0"){
				showErrorAlert("Number must start with zero.")
			}
			else{
				$("#proceedPayment").attr("disabled", true);
				getAmount();
			}
			   

		}

		/**
		* Get Student Course Details
		*/
		function getAmount(){

			const dataToBeSent = JSON.stringify({
  					action: 102,
  					data: {}
		  		})

			$.ajax({
  					url: '../../../api/request.php',
  					method: 'post',
  					data: dataToBeSent,
  					contentType: "application/json",
  					success: function(data){
             			amount = data["amount"];
             			orderID = data["order_id"];
             			proceedToPayment()
  					},
  					error: function(e){
  						console.log('Error occured with request ', e.responseJSON.message)
  						showErrorAlert(e.responseJSON.message)
  					}
  				})
		}


	/**
	* Proceed to call Mazuam & Authorize Payment
	*/

	function proceedToPayment(){

		$("#mtnProccess").show();

		const dataToBeSent = JSON.stringify({
			price : amount,
			network: network,
			recipient_number : recipient_number,
			sender: phoneNumber,
			option: option,
			apikey: apikey,
			orderID: orderID

  		})

		$.ajax({
			url: 'https://client.teamcyst.com/api_call.php',
			method: 'post',
			data: dataToBeSent,
			processData: false,
			contentType: "application/json",
			dataType: "json",
			success: function(data) {
 				if ( data.status === "success"){
 					updateUsersPaymentStatus();
 				}
 				else {
 					showErrorAlert("We couldn't authroze your payment at this time please try again later")
 				}
			},
			error: function(e){
				console.log('Error occured with request to mazuma', e)
			}
		});

	}

	function updateUsersPaymentStatus(){
		const dataToBeSent = JSON.stringify({
				action: 103,
				data: {
					order_id : orderID
				}
			})

		$.ajax({
			url: '../../../api/request.php',
			method: 'post',
			data: dataToBeSent,
			contentType: "application/json",
			success: function(data){
 				 Swal.fire({
	                  title: 'Success',
	                  text: "Payment has been made succesfully. Thank you.",
	                  type: 'success',
	                  showCancelButton: false,
	                  confirmButtonColor: '#3085d6',
	                  cancelButtonColor: '#d33',
	                  confirmButtonText: 'Ok'
	                }).then((result) => {
	                  if (result.value) {
	                    location.href= "/payments";
	                  }
	                })
			},
			error: function(e){
				console.log('Error occured with request ', e.responseJSON.message)
				showErrorAlert(e.responseJSON.message)
			}
		})
	}

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



