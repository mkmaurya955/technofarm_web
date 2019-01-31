<?php
session_start();
$error =NULL;
$log="FARM MANAGER LOGIN";
include('includes/database.php');
?>
<?php
if(isset($_POST['login'])){
    
        $username = $_POST['username'];
        $password = $_POST['password'];
		
 
	if(empty($username) || empty($password)){
		$error.= "Please fill in all the details before you proceed";
	}else{
		$sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
		$query = mysqli_query($db, $sql);
		$result = mysqli_fetch_array($query);
		if($result > 0){
			$_SESSION['surname'] = $username;
			header("Location:localhost/technofarm_web/admin/stocks.php");
		}else{
		  $error.= "You entered the wrong Username or Password. Try again.";
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
<script src="javascript/currentdate.js"></script>
<link type="text/css" href="jquery-ui/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="jquery-ui/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
				
			});
		</script>

</head>
<body>
<div id="cont">
	<div id="header"></div>
	<div id="menu">
	
	</div>
	<div id="submenu"></div>
	<div id="content">
			
			<div id="accordion">
			<div>

			<h3></h3>

				<div>
			<fieldset>
			<form name="alogin"  method="post">
			<div id="logger">
           <?php //Displays the person who is to login e.g Manager?>
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
		
			<table align="center">
			<tr>
			<td>
			<div id="label">Username</div>
			</td><td>
			<input type="text" name="username" size="30" required="" placeholder="username">
			</td>
			</tr>
			<tr>
			<td>
			<div id='label'>Password</div>
			</td><td>
			<input type="password" name="password" size="30" required="" placeholder="password">
			</td>
			</tr>
			<tr>
			<td colspan="2" align="right">
			<input type="submit" name="login" value="Login" size="30">
            <a href="../Technofarm_web/logout.php"><input type="button" value="Back" size="30"/></a>
			</td>
			</tr>
			</table>
			</form>
			</fieldset>
			</div>
			</div>
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