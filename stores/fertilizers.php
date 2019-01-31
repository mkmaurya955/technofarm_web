<?php
//start session
session_start();
include('../includes/database.php');

$error = null;

if(isset($_POST['add']))
	{
	
	//capture the form values
    $id=$_POST['id'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$category = $_POST['category'];
	
	
	
	//check if the fields are empty
	if(empty($description) ||empty($quantity) || empty($price)||empty($date)||empty($category))
	{
		$error ="Fill all the details before proceeding!!";
	}
	else
	{
	//insert the captured form details to the database
	$sql = "INSERT INTO fertilizers VALUES('$id','$description','$quantity','$price','$date','$category')";
	$query = mysqli_query($db, $sql);
	$result = mysqli_affected_rows($db);	
	if($result > 0){
		@ $error.= "The details for &nbsp;".$category."&nbsp;has been successfuly entered";
		}
	else{
		$error.="Fertilizer Could not be added!!";
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
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Fertilizers Details</a></h3></legend>
				<div>
				<form name="seeds" action="" method="post">
						<table align="center">
						
                       
            	<tr>
                
                <?php
					
					$g = mysqli_query($db, "select max(id) from fertilizers"); //Count the number of Machines the table
					while($id=mysqli_fetch_array($g))
					{
				?>
                
                	<th>Receipt ID</th>
                    <td><input type="text" name="id" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                
                <?php
					}
				?>
                        
                        
                        
                        
						<th><label>Description</label></th>
						<td><input type="text" name="description" autofocus="" required="" placeholder="e.g DAP, ammonia"></td>
                        <th><label>Date Received</label></th>
						<td><input type="date" name="date"/></td>
												
						</tr>
						
						<tr>
						<th><label>Category</label></th>
						<td>
                            <select name="category">
                                <option value="Nitrogen Fertilizers">Nitrogen Fertilizers</option>
                                <option value="Potassium Fertilizers">Potassium Fertilizers</option>
                                <option value="Phosphorous Fertilizers">Phosphorous Fertilizers</option>
                                <option value="Compound Fertilizers">Compound Fertilizers</option>
                                <option value="Blended Fertilizers">Blended Fertilizers</option>
                                <option value="Other">Other</option>
                            </select>
                        </td>
						<th><label>Quantity</label></th>
						<td><input type="text" name="quantity" required=""></td>
						<th><label>Price per Unit</label></th>
						<td><input type="text" name="price" required="" placeholder="KSh."></td>
						</tr>
                        
						</table>
						
						<center>
                                <input type="submit" name="add" value="Add">  
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