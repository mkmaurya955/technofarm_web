<?php
session_start();
$error =NULL;
$msg = $_REQUEST['err'];
$log="APPLICANT LOGIN";
include('includes/database.php');
if(isset($_POST['login'])){
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) || empty($password)){
		$error.= "Please fill in all the details before you proceed";
	}else{
		$sql = "SELECT * FROM applicant_details WHERE username='$username' and password='$password'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query);
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
<script src="javascript/validate.js"></script>
<script language="javascript">
function Validate()
{
	  var unValidate=document.login.username.value;
  if(unValidate=="")
  {
    alert("Username field is empty")
    return false;
  }
  
   var passValidate=document.login.password.value;
  if(passValidate=="")
  {
    alert("Password field is empty")
    return false;
  }
}
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

			<h3><a href="#"><font color="#800000">Enter your Login details here.</font></a></h3>
				<div>
			
			<fieldset>
			<form name="login" onsubmit="return Validate();" method="post">
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
			<table align="center">
			<tr>
			<td>
			<div id="label">Username</div>
			</td><td>
			<input type="text" name="username" size="30">
			</td>
			</tr>
			<tr>
			<td>
			<div id="label">Password</div>
			</td>
			<td>
			<input type="password" name="password" size="30">
			</td>
			</tr>
			<tr>
			<td colspan="2" align="right">
			<input type="submit" name="login" value="LOGIN" size="30">
			</td>
			</tr>
			</table>
			<div id="line">
			<font color="#0000ff">Have you forgotten your password?</font><a href="#"> Reset it here.</a>
			<br />
			<font color="#0000ff">Need an account? <a href="signup.php">Sign up here.</a></font>
			</div>
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