<?php
session_start();
$error = null;
$var = $_SESSION['id'];


?>
<html>
<head>
<title></title>
<meta name="" content="">
<link href="css/style.css" rel="stylesheet" type="text/css">
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
	<font color="#008000" style="padding-left:10px;"><u>
	<?php
	
	echo "WELCOME ".strtoupper($var)."<br/>";
	
	?>
	</u>
	</font>
		
		<div id="accordion">
			<div>
			<h4>What you need to Know about Registration on Births</h4>
				<h3><a href="#"><strong>Right From the start</strong></a></h3>
				<div>

<ul>
<li>The very first right of a child as soon as he/she is born is a right
 to a name, to an identity and to nationality. The only way to claim 
these rights is to have the birth of your child registered and issued 
with a certificate of birth.</li>
<li>Your child has a right to be registered right from the start so as 
to enjoy their right to official identification and recognition.</li>
</ul>

				</div>
				<h3><a href="#"><strong><strong>Your Unregistered Child is a Vulnerable Child.</strong>
</strong></a></h3>
				<div>
<ul>
<li>He/She is unprotected from child theft and trafficking</li>
<li>Vulnerable to arraignment in a court of law</li>
<li>Vulnerable to child marriage</li>
</ul>
				</div>
				
				<h3><a href="#"><strong>Secure Your Future</strong></a></h3>
				<div>


<ul>
<li>Your record of birth is a source of information for good governance 
and is used by the government for planning and allocation of resources 
for education, health, water and sanitation and other sectors.</li>
</ul>

				</div>
				
				<h3><a href="#"><strong>Your Proof to Family Ties </strong>
</a></h3>
				<div>

<ul>
<li>Avoid disinheritance of your children in the event of your death.</li>
<li>&nbsp;A birth certificate is the only official documentary evidence identifying you as the parent of your children</li>
</ul>

</div>
				
				<h3><a href="#"><strong>Your Ticket to FAST Acquisition of Essential Services</strong>
</a></h3>
				<div>

<ul>
<li>The birth certificate of your child will be required for school 
admission, for acquisition of a national Identity card, for acquisition 
of a passport, for proof of kinship when making inheritance claims.</li>
<li>Register the birth of your child as soon as it occurs and obtain a 
birth certificate to avoid the inconveniences of registering late.</li>
</ul></div>


			
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