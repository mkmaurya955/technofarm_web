<?php

?>
<html>
<head>
<title></title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="cont">
	<div id="header">
	
	</div>
	<div id="menu">
	<?php
	$mn="stores_menu.php";
	if(file_exists($mn) && is_readable($mn))
	{
	 include_once($mn);
	}
    
	
	?>
	</div>
	<div id="submenu1">
	<?php
	$admn="stores_submenu.php";
	if(file_exists($admn) && is_readable($admn))
	{
	 include_once($admn);
	}
	
	?>
	</div>
	<div id="content">
    <center>
    ?content <p></p>
    ?content<p></p>
    ?content<p></p>
    ?content<p></p>
    ?content<p></p>
    ?content<p></p>
    ?content<p></p>
    ?content<p></p>
    ?content<p></p>
    </center>
	
</div>
<div id="footer">

	<?php
	$foot="../footer.php";
	if(file_exists($foot) && is_readable($foot))
	{
	 include_once($foot);
	}
	?>
</div>
</div>
</body>
</html>