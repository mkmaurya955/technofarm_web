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
	$admenu="admin_menu.php";
	if(file_exists($admenu) && is_readable($admenu))
	{
	 include_once($admenu);
	}
    
	
	?>
	</div>
    
	<div id="submenu1">
   	<?php
	$admn="admsubmenu.php";
	if(file_exists($admn) && is_readable($admn))
	{
	 include_once($admn);
	}
	
	?>
	</div>
	<div id="content">
    <br />    
			
			<fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Estimates</a></h3></legend>
				<div>
				<form name="estimate" action="../admin/estimated.php" method="post">
						<table align="center">
						
                       
            	<tr>
                        <th><label>Acreage (Ha)</label></th>
						<td><input type="text" name="acreage" required=""></td>
                        <th>Crop Planting</th>
						<td>
                            <select name="crop">
                                <option value="Durum Wheat">Durum Wheat</option>
                                <option value="Bread Wheat">Bread Wheat</option>
                                </select>
                        </td>
                        <th><label>Date</label></th>
						<td><input type="text" value="<?php echo date("d/m/y"); ?>" readonly=""></td>
						</tr>
                        
						</table>
						
						<center>
                                <input type="submit" name="estimate" value="Estimate">  
                                <input type="reset" value="Cancel" />
                                
                        </center>
				</form>
    </fieldset>
    
    
	
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