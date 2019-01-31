<?php
session_start();
$error =NULL;
include('includes/database.php');
$db = new Database();
if(isset($_POST['confirm']))
{
	
	
	$fn = $_POST['vfname'];
	$sn=$_POST['vsname'];
	$refno=$_POST['vref'];
	
	if(empty($fn)||empty($sn)||empty($refno))
	{
		$error="You must fill in all the details.";
	}
	
	$ssql = "SELECT * FROM child_info WHERE ref_no='$refno'";
	$qqry = mysql_query($ssql);
	$rres = mysql_fetch_array($qqry);
	if($rres > 0)
	{
	$error .= "The child's profile with that reference number is already completed.You can go ahead an make an application.";
	}	
	else{
		$sql = "SELECT * FROM births WHERE ref_no='$refno'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query);
		if($result > 0)
			{
				$first = $result['first_name'];
				$sur = $result['surname'];
				$mid = $result['middle_name'];
				$sx = $result['sex'];
				$dtob = $result['date_ob'];
				
			if($fn==$first && $sn==$sur)
			{	
				header("Location:profile.php?fn=$fn && min=$mid && sin=$sn && sx=$sx && dt=$dtob && rf=$refno");
			}
			else{
				$error = "The names registered with the reference number you gave are different. Try again.";
				}
		
			}
										
		else
		{
		$error="There is no birth registered with those details.";
		}	
	}
		
		
	}

?>
<html>
<head>
<title></title>
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
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<script src="javascript/validate.js"></script>
<script language="javascript">
function Validate()
{
	var refValid=document.verify.vref.value;
  if(refValid=="")
  {
    alert("Reference number field is empty")
    return false;
  }
  else if(isDigits(refValid)==false)
  {
   alert("Invalid entry in the Reference number field.")
   return false;
  }

  
  var fnValid=document.verify.vfname.value;
  if(fnValid=="")
  {
    alert("First name field is empty")
    return false;
  }
  
  var snValid=document.verify.vsname.value;
  if(snValid=="")
  {


    alert("Surname field is empty")
    return false;
  }  
  }
  </script>
</head>
<body>
<div id="cont">
	<div id="header"></div>
	<div id="menu">
	<?php
	$mn="menu.php";
	if(file_exists($mn) && is_readable($mn))
	{
	 include_once($mn);
	}
	
	?>
	</div>
	<div id="submenu">
	<?php
	$smn="submenu.php";
	if(file_exists($smn) && is_readable($smn))
	{
	 include_once($smn);
	}
	
	?>												
	
	
	
	
	

	</div>
		<div id="content">
		<div id="msg">
			<div id="error">
			<?php
			if(strlen($error)){
				echo $error;
			}
			?>
			</div>
			</div>
			<div id="accordion">
			<form name="verify" onsubmit="return Validate();" action="<?php $PHP_SELF ?>" method="post">
			<div>
			
				<h3><a href="#">Is the child birth registered by the chief of your location? Enter the registration details below:</a></h3>
				<div>
				<table>
				<tr><td><strong>REGISTRATION REFERENCE NUMBER</strong></td><td><input type="text" name="vref"/></td></tr>
				<tr><td><strong>FIRST NAME</strong></td><td><input type="text" name="vfname"></td></tr>
				<tr><td><strong>SURNAME/FATHER'S NAME</strong></td><td><input type="text" name="vsname"></td></tr>
				<tr><td></td><td><input type="submit" name="confirm" value="CONFIRM DETAILS"/></td></tr>
				
				</table>
				</div>
			</div>
			</form>
			
		
		
			
		
			
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