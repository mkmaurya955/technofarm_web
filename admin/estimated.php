<?php

    @$acreage = $_POST['acreage'];
    @$crop = $_POST['crop'];
    //$date = $_POST['date'];
   
   
   //Estimates
    $seeds = $acreage * 3000 * 1;
    $fertilizers = $acreage * 4000;
    $herbicides = $acreage * 1500;
    $labour = $acreage * 3*700;
    $tilling = $acreage * 5400;
    $planting = $acreage * 3700;
    $weeding = $acreage * 3500;
    $harvesting = $acreage *4000;
    $storage = $acreage * 2000;
    $overheads = $acreage * 1500;
    //Total
    $total= $seeds + $fertilizers + $herbicides + $labour + $tilling + $planting + $weeding + $harvesting + $storage + $overheads;
    //Estimated yields using 35 bags per ha
    $yields = 35 * 3000* $acreage;
    $profit = $yields - $total;
    
?>
	

<html>
<head>
<title></title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/login.css" rel="stylesheet" type="text/css">
<script src="../javascript/currentdate.js"></script>
<link type="text/css" href="../jquery-ui/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="../jquery-ui/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="../jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
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
	<div id="header">
	
	</div>
	<div id="menu">
	<?php
	$mn="admin_menu.php";
	if(file_exists($mn) && is_readable($mn))
	{
	 include_once($mn);
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
	<div id="error" style="color: red;" style="size: a4;">
			
    </div>
	<div id="accordion">
	
	     <div>
			
			<fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Average Estimates:</a></h3></legend>
				<div>
				<form name="estimated" action="" method="post">
						<table align="center">
						
                       
            	<tr>               
                	<th>Plot Size</th>
                    <td><input type="text" value="<?php echo $acreage . " Hectares"; ?>" readonly="readonly"/></td>
                
             
						<th><label>Crop</label></th>
						<td><input type="text" value="<?php echo $crop; ?>" autofocus=""></td>
						<th><label>Date</label></th>
						<td><input type="text" value="<?php echo date("d/m/y"); ?>" readonly=""></td>
						</tr>
					
					</table>
						-----------------------------------------------------------------------------------------------	
					<table align="center">
                    <tr>
                    	<th>Seeds</th>
                        <td><input type="text" value="<?php echo ("Kshs ". $seeds); ?>" readonly="readonly"/></td>
						<th><label>Fertilizers</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $fertilizers); ?>" autofocus=""></td>
						<th><label>Herbicides</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $herbicides); ?>"></td>
						</tr>
                    <tr>
                    
                        <th>Labour</th>
                        <td><input type="text" value="<?php echo ("Kshs ". $labour); ?>" readonly="readonly"/></td>
						<th><label>Tilling</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $tilling); ?>" autofocus=""></td>
						<th><label>Planting</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $planting); ?>"></td>
                    </tr>
                    <tr>
                    
                        <th>Weeding</th>
                        <td><input type="text" value="<?php echo ("Kshs ". $weeding); ?>" readonly="readonly"/></td>
						<th><label>Harvesting</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $harvesting); ?>" autofocus=""></td>
						<th><label>Storage</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $storage); ?>"></td>
                    </tr>
                        
                    </table>
                    -----------------------------------------------------------------------------------------------
                    <table align="center">
                    <tr>               
                	<th>Overheads</th>
                    <td><input type="text" value="<?php echo ("Kshs ". $overheads); ?>" readonly="readonly"/></td>
                
						<th><label>Total</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $total); ?>" autofocus=""></td>
						<th><label>Yields</label></th>
						<td><input type="text" value="<?php echo ("Kshs ". $yields); ?>"></td>
						</tr>
					<tr>
                    <th>Profits</th>
                    <td><input type="text" value="<?php echo ("Kshs ". $profit); ?>" style="color: red;"></td>
                    
                   <td> <?php echo "<a href='javascript:window.print()'>Print</a>";?></td>
                    <td><a href="../admin/estimates.php"><input type="button" value="Back" /></a></td>
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