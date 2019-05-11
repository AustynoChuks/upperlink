<?php
if(!isset($include_form))
	header("Location:denied.html");
?>
<form id="adio-form-upperlink" method="post" action="apply.php" enctype="multipart/form-data">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" class="form-control" placeholder="Enter Your firstname" required="true">
					</div>

					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" class="form-control" placeholder="Enter Your lastname" required="true">
					</div>

					<div class="form-group">
						<label>Phone Number</label>
						<input type="tel" name="tel" class="form-control" placeholder="Enter Your Phone number" required="true">
						<p>Please provide a valid telephone number (+ is accepted)</p>
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control" placeholder="Enter Your email Address" required="true">
						<p>Please provide a valid email address (include the @ sign)</p>
					</div>

					<div class="form-group">
						<label>Cover letter</label>
						<textarea type="text" class="form-control" rows="10" required="true" data-min="0" data-max="500" data-count="#count1" name="coverletter"></textarea>
						<span class="help-block"><span id="count1">0</span> out of 500</span>
					</div>

					<div class="form-group">
						<label>Passport</label>
						<input type="file" name="passport" class="form-control" required="true" max-size="<?php echo (100 * 1024);?>">
						<p class="help-block">File size must not exceed 100kb</p>
					</div>

					<input type="hidden" name="apply_hidden_software">

					<div class="form-group">
						<label>Resumee</label>
						<input type="file" name="resumee" class="form-control" required="true" max-size="<?php echo (2 * 1024 * 1024);?>">
						<p class="help-block">Choose your resumee<br/>File size must not exceed 2Mb</p>
					</div>

					<div class="form-group">
						<input type="button" name="" class="btn btn-success" id="apply-btn">
					</div>
				</form>