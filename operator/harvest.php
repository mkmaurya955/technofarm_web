<?php
//start session
session_start();
include('../includes/database.php');


$error = null;

if(isset($_POST['add']))
	{
	
	//capture the form values
    $id=$_POST['id'];
	$acreage = $_POST['acreage'];
	$machine = $_POST['machine'];
	$date = $_POST['date'];
	$yields = $_POST['yields'];
    $fuel = $_POST['fuel'];

    
	
	//check if the fields are empty
	if(empty($acreage)||empty($fuel)||empty($chemicals))
	{
		$error ="Fill all the details before proceeding!!";
	}
	else
	{
	//insert the captured form details to the database
	$sql = "INSERT INTO harvest VALUES('$id','$acreage','$machine','$date','$fuel','$yields')";
	$query = mysqli_query($db, $sql);
	$result = mysqli_affected_rows($db);
	if($result > 0){
		@ $error.= "Records updated successfully!";
		}
	else{
		$error.="The Record Could not be added!. Try again";
	}
	}
}
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
	$mn="operator_menu.php";
	if(file_exists($mn) && is_readable($mn))
	{
	 include_once($mn);
	}
	
	?>
	</div>
	<div id="submenu1">
	<?php
	$admn="operator_submenu.php";
	if(file_exists($admn) && is_readable($admn))
	{
	 include_once($admn);
	}
	
	?>
	</div>
	<div id="content">
	<div id="error" style="color: red;" style="size: a4;">
			<?php
			if(strlen($error) > 0){
				echo $error;
			}
			?>
    </div>
	<div id="accordion">
	
	     <div>
			
			<fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Harvesting Form</a></h3></legend>
				<div>
				<form name="harvest" action="" method="post">
						<table align="center">
						
                       
            	<tr>
                
                <?php
					
					$g = mysqli_query($db,"select max(id) from harvest"); //Count the number of Machines the table
					while($id=mysqli_fetch_array($g))
					{
				?>
                
                	<th>Harvesting No</th>
                    <td><input type="text" name="id" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                
                <?php
					}
				?>
						<th><label>Acreage</label></th>
						<td><input type="text" name="acreage" autofocus="" required="" placeholder="Size(ha)"></td>
                        <th><label>Machinery Used</label></th>
						<td><input type="text" name="machine" placeholder="VIN number"/></td>
												
						</tr>
						
						<tr>
						<th><label>Date</label></th>
						<td><input type="date" name="date" required=""></td>
						<th><label>Fuel Used</label></th>
						<td><input type="text" name="fuel" required="" placeholder="litres"></td>
                        <th><label>Yields</label></th>
						<td><input type="text" name="yields" required="" placeholder="tonnes"></td>
						</tr>
                        
						</table>
						
						<center>
                                <input type="submit" name="add" value="Update">  
                                <input type="reset" value="Cancel" />
                                
                        </center>
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