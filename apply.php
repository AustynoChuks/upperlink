<?php
@session_start();

include_once("class.inc.php");

$include_form = true;

if(isset($_POST["apply_hidden_software"])){
	$instance = new Apply();
	try{
		$status = $instance->apply_data();
		header("Location:success.html");
	}catch(Exception $e){
		$formErrorStatus = true;
		$formErrorMessage = $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Apply | Software Engineer
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.js"></script>
	<script type="text/javascript" src="myRepo/formv/validator.js"></script>
	<link rel="stylesheet" type="text/css" href="myRepo/formv/validator.css">
	<style type="text/css">
		html, body {
			height: 100%
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			
			
			<div class="col-md-6 col-md-offset-3">
				<h1>Role - Software Engineer</h1>
				<div class="alert alert-warning alert-dismissible" role="alert" id="msg-container" style="display: none">
				  <strong id="msg">You should check in on some of those fields below.</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php
				if(isset($formErrorStatus) && $formErrorStatus == true){
					?>
					<div class="alert alert-warning">
						<strong>Error</strong><span><?php echo $formErrorMessage; ?></span>
					</div>
					<?php
				}else{
					include("form.php");
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		(function(){
			// Alert Message when something goes wrong when trying to submit
			function showmesg(msg){
				$("#msg-container").show();
				$("#msg").html(msg);

				//Animate application form when there are errors
				$("form").addClass("form-error");

				//Remove animation after 1 sec
				setTimeout(function(){
					$("form").removeClass("form-error");
				}, 1000);


				$("html, body").animate({
		          scrollTop: $("form").offset().top-150
		        });
			}

			//initialize Script only when apply page is fully loaded
			$(document).ready(function(){
				$("#msg-container").hide();
				//Validate form before submission (only required fields are validated)
				$("#apply-btn").click(function(){
					let form_status = $().matrixV("#adio-form-upperlink");
					$("input[max-size]").each(function(a, b){
						let sizeMax = $(b).attr("max-size");
						if(b.files[0] != undefined && b.files[0].size > sizeMax){
							$(b).addClass("red");
							form_status = false;
						}

						if($(b).attr("name") == "resumee"){
							if(b.files[0] != undefined){
								var type = b.files[0].type;
								if(type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && type != "application/pdf" && type != "application/msword"){
									$(b).addClass("red");
									form_status = false;
								}
							}
						}

						if($(b).attr("name") == "passport"){
							if(b.files[0] != undefined){
								var type = b.files[0].type;
								if(type != "image/jpeg"){
									$(b).addClass("red");
									form_status = false;
								}
							}
						}
					})
					if(form_status){
						let passport = true;
						let resumee = true;

						if(passport && resumee){
							$("form").submit();
						}else{
							showmesg("Your Passport must not exceed 100kb and must be JPEG format<br/>Also check that your resumee is one of the required formats and must not exceed 2Mb");
						}
					}else{
						showmesg("Please provide all required fields");
					}
				})
			})
		})()
	</script>
</body>
</html>