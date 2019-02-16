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
                      <h4 class="card-title">Youtube Videos</h4>
                      <p class="card-description">
                        Please find below available youtube videos...
                      </p>
                      <div id="unix" data-ycp_title="Programming In Twi" data-ycp_channel="UCOoLh1w-HgcHcyKsznxa8wg"></div>
                    </div>
                  </div>
                </div>
          </div>
        </div>

		<!-- include jQuery -->
<?php include "../includes/footer.php"; ?>

		<!-- jQuery Youtube Channels Playlist -->
		<script src="../pages/portal/assets/js/ycp.js"></script>

		<!-- Setting Example -->
		<script>		
		$(function() {
			
			$("#unix").ycp({
				apikey : 'AIzaSyCXnYh0W-W_pDoFVt7Yuw-LkYEi3OCrQlg',
				// playlist : 7,
				autoplay : false,
				related : false
			});
			
			// $(".demo").ycp({
			// 	apikey : 'AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0'
			// });
		
			$("#go").click(function(){
				if($("#tit").val() != '' && $("#ch").val() != ''){
					$("#unix").data('ycp_title', $("#tit").val());
					$("#unix").data('ycp_channel', $("#ch").val());
					$("#unix").ycp({
						apikey : 'AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0',
						playlist : 10,
						autoplay : true,
						related : true
					});
				}else{
					alert('Not empty!');
				}
				return false;
			});
			
		});
		</script>

