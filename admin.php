<?php
@session_start();

include_once("class.inc.php");

$admin = new Admin();
//print_r($_SERVER);
//$isLogged = $admin->issLogged();

//if(!isLogged)
	//header("Location:login.php");

$inst = new GetData();
$all = $inst->returnAll();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/jquery.js"></script>
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
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<th>Sn</th>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Email</th>
				<th>Tel</th>
				<th>CoverLetter</th>
				<th>Passport</th>
				<th>Resumee</th>
				</thead>
				<tbody>
					<?php
					foreach($all as $single){
						?>
						<tr>
							<td>1</td>
							<td><?php echo $single["lname"]; ?></td>
							<td><?php echo $single["fname"]; ?></td>
							<td><?php echo $single["email"]; ?></td>
							<td><?php echo $single["phone"]; ?></td>
							<td><?php echo $single["coverletter"]; ?></td>
							<td><a href="<?php echo "http://".$_SERVER["SERVER_NAME"].dirname($_SERVER["REQUEST_URI"])."/".$single["passport"];?>"><?php echo $single["passport"]; ?></a></td>
							<td><a href="<?php echo "http://".$_SERVER["SERVER_NAME"].dirname($_SERVER["REQUEST_URI"])."/".$single["resumee"];?>"><?php echo $single["resumee"]; ?></a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>