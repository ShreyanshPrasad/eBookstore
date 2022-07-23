<?php
  
  session_start();
	if(isset($_POST['submit'])){
	
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	if($name == "" || $pass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pass = mysqli_real_escape_string($conn, $pass);
	//$pass = sha1($pass);

	// get from db
	$query = "SELECT * from customers where name = '" . $name . "' and password = '" . $pass . "'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($name != $row['name'] && $pass != $row['password']){
		echo "Name or pass is wrong. Check again! \nEntered name = " . $name . "\nPasssword = " . $pass;
		$_SESSION['admin'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['user'] = $name;
    echo "<script> alert('Login done'); </script>";
	header("Location: index.php");

}else{
  $title = "User Login";
  require_once "./template/header.php";
?>
<div class='container text-center'>
        <form class="form-horizontal" method="post" action="userLogin.php">
			<h2>Existing User Login</h2>
			<div class="form-group">
				<label for="name" class="control-label col-md-4">User Name / Email</label>
				<div class="col-md-4">
					<input type="text" name="name" class="form-control" placeholder='User Id' required='User id cant be left blank'>
				</div>
			</div>
			<div class="form-group">
				<label for="pass" class="control-label col-md-4">Password</label>
				<div class="col-md-4">
					<input type="password" name="pass" class="form-control" placeholder='Password' requred='Password cant be left blank'>
				</div>
			</div>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
</div>
<?php
  }
  require_once "./template/footer.php";
?>