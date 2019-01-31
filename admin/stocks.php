<?php
//start session
session_start();
include('../includes/database.php');


$error = null;

    $acreage = 10;
  //Displaying all the machines
   	$machinery = mysqli_query($db, "SELECT count(id) from machinery;");
        $mac = mysqli_fetch_assoc($machinery);	
    
  //Total seeds in kgs
  $seeds = mysqli_query($db, "SELECT sum(quantity) from seeds;");
    $seed =mysqli_fetch_assoc($seeds);
  
  //Total Fertilizers
  	$fertilizers = mysqli_query($db, "SELECT sum(quantity) from fertilizers;");
      $fert = mysqli_fetch_assoc($fertilizers);	
				
  //Total chemicals (litres)
  $chemicals = mysqli_query($db, "SELECT sum(quantity) from chemicals;");
      $chem = mysqli_fetch_assoc($chemicals);
      
  //Total Number of Employees
  $employees = mysqli_query($db, "SELECT count(id) from users;");
      $emp = mysqli_fetch_assoc($employees);
      
  //Total fuel in litres
  $fuels = mysqli_query($db, "SELECT sum(quantity) from fuel;");
      $fuel = mysqli_fetch_assoc($fuels);
      
      
   //Used estimates
    $useeds = mysqli_query($db, "SELECT sum(seeds) from plant;");
      $useed = mysqli_fetch_assoc($useeds);
      
    $ufertilizers = mysqli_query($db, "SELECT sum(fertilizers) from plant;");
      $ufertilizer = mysqli_fetch_assoc($ufertilizers);
      
    $uchemicals = mysqli_query($db, "SELECT sum(chemicals) from spray;");
      $uchemical = mysqli_fetch_assoc($uchemicals);
      
    $ufuels_plant = mysqli_query($db, "SELECT sum(fuel) from plant;");
      $ufuel_plant = mysqli_fetch_assoc($ufuels_plant);
      
    $ufuels_tills = mysqli_query($db, "SELECT sum(fuel) from till;");
      $ufuel_till = mysqli_fetch_assoc($ufuels_tills);
      
    $ufuels_sprays = mysqli_query($db,"SELECT sum(fuel) from spray;");
      $ufuels_spray = mysqli_fetch_assoc($ufuels_sprays);
      
    $ufuels_harvests = mysqli_query($db, "SELECT sum(fuel) from harvest;");
      $ufuels_harvest = mysqli_fetch_assoc($ufuels_harvests);
      
    $total_fuel =$ufuel_plant + $ufuel_till + $ufuels_spray + $ufuels_harvest;//For planting, tilling, spraying, harvesting
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
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Summary of Stocks:</a></h3></legend>
				<div>
				<form name="stocks" action="" method="post">
						<table align="center">
						
                 	<tr>               
                	<th>Seeds</th>
                    <td><input type="text" value="<?php echo implode($seed) . " Kgs"; ?>" readonly="readonly"/></td>
						<th><label>Fertilizers</label></th>
						<td><input type="text" value="<?php echo implode($fert) . " Kgs"; ?>" autofocus=""></td>
						<th><label>Chemicals</label></th>
						<td><input type="text" value="<?php echo implode($chem) . " Litres" ; ?>" readonly=""></td>
						</tr>
                        
                	<tr>               
                	<th>Total Employees</th>
                    <td><input type="text" value="<?php echo implode($emp) ; ?>" readonly="readonly"/></td>
						<th><label>Fuel</label></th>
						<td><input type="text" value="<?php echo implode($fuel) . " Litres"; ?>" autofocus=""></td>
						<th><label>Machineries</label></th>
						<td><input type="text" value="<?php echo implode($mac); ?>" readonly=""></td>
						</tr>
					
					</table>
					
				</form>
    </fieldset>
    <fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Used Inputs:</a></h3></legend>
				<div>
				<form action="" method="post">
						<table align="center">
						
                       
            	<tr>               
                	<th>Seeds</th>
                    <td><input type="text" value="<?php echo implode($useed) . " Kgs"; ?>" readonly="readonly"/></td>
						<th><label>Fertilizers</label></th>
						<td><input type="text" value="<?php echo implode($ufertilizer) . " Kgs"; ?>" autofocus=""></td>
					
						</tr>
                        
                	<tr>               
                	<th>Chemicals</th>
                    <td><input type="text" value="<?php echo implode($uchemical). " Litres"; ?>" readonly="readonly"/></td>
						
						<th><label>Fuel</label></th>
						<td><input type="text" value="<?php echo implode($total_fuel) . " Litres"; ?>" readonly=""></td>
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