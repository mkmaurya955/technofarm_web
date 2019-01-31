<?php
session_start();
$error =NULL;
@$msg = $_REQUEST['err'];
$log="LOGIN HERE:";
include('includes/database.php');
if(isset($_POST['login'])){
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) || empty($password)){
		$error.= "Please fill in all the details before you proceed";
	}else{
		$sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
		$query = mysqli_query($db, $sql);
		$result = mysqli_fetch_array($query);
		if($result > 0){
			$_SESSION['id'] = $username;
			header("Location:home.php");
			
		}else{
			$error.= "You entered the wrong surname or password. Try again.";
		}
	}
}
?>
<html>
<head>
<title></title>
<meta name="" content="">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="cont">
	<div id="header">
	
	</div>
	<div id="menu"></div>
	<div id="submenu"></div>
  <div id="content"><br><br><br><br>
	<div id="signup">
			<fieldset>
			<form action="<?php $PHP_SELF ?>" method="post">
			<div id="logger">
			<?php
			echo $log;
			?>
			</div>
			<div id="error">
			<?php
			if(strlen($error) > 0){
				echo $error;
			}
			?>
			</div>
			<div id="swaplogin">
			<a href="admin_login.php">Farm Manager</a>
			<a href="stores_login.php">Stores Clerk</a>
            <a href="operator_login.php">Field Operator</a>
			
			</div>
			</form>
			</fieldset>
			
			</div>
</div>
			<div id="footer">
			
	<?php
	$foot="footer.php";
	if(file_exists($foot) && is_readable($foot))
	{
	 include_once($foot);
	}
	?>
			</div>

</div>		
</body>
</html>