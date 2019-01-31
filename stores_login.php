<?php
session_start();
$error =NULL;
$log="Stores Login";
include('includes/database.php');

if(isset($_POST['login']))
	{
	
	
	$id = $_POST['id'];
	$password = $_POST['password'];
	$category ="Store Clerk";
	if(empty($id) || empty($password)){
		$error.= "Please fill in all the details before you proceed";
	}else{
		$sql = "SELECT * FROM users WHERE idno='$id' and password='$password' and category ='$category' ";
		$query = mysqli_query($db, $sql);
		@ $result = mysqli_fetch_array($query);
		if($result > 0){
			$_SESSION['id'] = $id;
			header("Location:http://localhost/Technofarm_web/stores/stocks.php");
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
<script language="javascript">
function cValidate()
{
	  var uValidate=document.clogin.surname.value;
  if(uValidate=="")
  {
    alert("Surname field is empty")
    return false;
  }
  
   var pValidate=document.clogin.password.value;
  if(pValidate=="")
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
	<div id="submenu">
	<?php
	$submn="chiefsubmenu.php";
	if(file_exists($submn) && is_readable($submn))
	{
	 include_once($submn);
	}
	
	?>
	</div>
	<div id="content">
			
			<div id="accordion">
			<div>
			
			<h3><a href="#"><font color="#800000">Enter your Login details here.</font></a></h3>
				<div>
			<fieldset>
			<form name="clogin" onsubmit="return cValidate();" method="post">
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
			<div id="label">National ID:</div>
			</td><td>
			<input type="text" name="id" size="30" placeholder="national Id">
			</td>
			</tr>
			<tr>
			<td>
			<div id='label'>Password</div>
			</td><td>
			<input type="password" name="password" size="30" placeholder="password">
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