<?php
  if(isset($_POST['submit'])){
    require_once "./functions/database_functions.php";
    setCustomerId($_POST['uName'], $_POST['uAddress'], $_POST['uCity'],
                        $_POST['uZip'], $_POST['uCountry'], $_POST['uPassword']);
    header('Location: index.php');
  }
  $title = "Register";
  require_once "./template/header.php";
?>
<div class='container text-center'>
        <form class="form-horizontal" method="post" action="register.php">
			<h2>User Registaration</h2>
			<div class="form-group">
				<label for="uName" class="control-label col-md-4">User Name</label>
				<div class="col-md-4">
					<input type="text" name="uName" class="form-control" placeholder='User Name' required>
				</div>
			</div>
            <div class="form-group">
				<label for="uAddress" class="control-label col-md-4">Address</label>
				<div class="col-md-4">
					<input type="text" name="uAddress" class="form-control" placeholder='Address' required>
				</div>
			</div>
			<div class="form-group">
				<label for="uCity" class="control-label col-md-4">City</label>
				<div class="col-md-4">
					<input type="text" name="uCity" class="form-control" placeholder='City' required>
				</div>
			</div>
			<div class="form-group">
				<label for="uZip" class="control-label col-md-4">Zip</label>
				<div class="col-md-4">
					<input type="text" name="uZip" class="form-control" placeholder='ZIP Code' required>
				</div>
			</div>
            <div class="form-group">
				<label for="uCountry" class="control-label col-md-4">Country</label>
				<div class="col-md-4">
					<input type="text" name="uCountry" class="form-control" placeholder='Country' required>
				</div>
			</div>
            <div class="form-group">
				<label for="uPassword" class="control-label col-md-4">Password</label>
				<div class="col-md-4">
					<input type="password" name="uPassword" class="form-control" placeholder='Password' required>
				</div>
			</div>
            <div class="form-group">
				<label for="cPassword" class="control-label col-md-4">Confirm Password</label>
				<div class="col-md-4">
					<input type="text" name="cPassword" class="form-control" placeholder='Confirm Password' required>
				</div>
			</div>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
</div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>