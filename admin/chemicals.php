<?php
//start session
session_start();
include('../includes/database.php');

$error = null;

if(isset($_POST['add']))
	{
	
	//capture the form values
    $id=$_POST['id'];
	$pname = $_POST['pname'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$rdate = $_POST['rdate'];
	$edate = $_POST['edate'];
	
	
	
	//check if the fields are empty
	if(empty($pname) ||empty($quantity) || empty($price)||empty($rdate)||empty($edate))
	{
		$error ="Fill all the details before proceeding!!";
	}
	else
	{
	//insert the captured form details to the database
	$sql = "INSERT INTO chemicals VALUES('$id','$pname','$quantity','$price','$rdate','$edate')";
	$query = mysql_query($sql);
	$result = mysql_affected_rows();
	if($result > 0){
		@ $error.= "The details for &nbsp;".$pname."&nbsp;has been successfuly entered";
		}
	else{
		$error.="Chemical Details Could not be added!!";
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
			<?php
			if(strlen($error) > 0){
				echo $error;
			}
			?>
    </div>
	<div id="accordion">
	
	     <div>
			
			<fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Farm Chemicals Details</a></h3></legend>
				<div>
				<form name="chemicals" action="" method="post">
						<table align="center">
						
                       
            	<tr>
                
                <?php
					
					$g = mysqli_query($db, "select max(id) from chemicals"); 
					while($id=mysqli_fetch_array($g))
					{
				?>
                
                	<th>Receipt ID</th>
                    <td><input type="text" name="id" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                
                <?php
					}
				?>
                        
                        
                        
                        
						<th><label>Product Name</label></th>
						<td><input type="text" name="pname" autofocus="" required="" placeholder="Fungicide, herbicide"></td>
                        <th><label>Quantity</label></th>
						<td><input type="text" name="quantity"/></td>
												
						</tr>
						
						<tr>
						<th><label>Price Per Unit</label></th>
						<td><input type="text" name="price" required=""></td>
						<th><label>Date Received</label></th>
						<td><input type="date" name="rdate" required=""></td>
						<th><label>Expiry Date</label></th>
						<td><input type="date" name="edate" required=""></td>
						</tr>
                        
						</table>
						
						<center>
                                <input type="submit" name="add" value="Add">  
                                <input type="reset" value="Cancel" />
                                
                        </center>
				</form>
    </fieldset>
    
    
    
    <fieldset>
   <legend> <center><h3><a href="#" style="color:goldenrod;">Chemicals Inventory:</a></h3></center></legend>
<table class="mytable" style=" margin-left: 150px;">
<center>
    	<tr>
            <th>Receipt ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price Per Unit</th>
            <th>Date Received</th>
            <th>Expiry Date</th>
           
    	</tr>
        <?php
        $sql = mysqli_query($db, "select sum(quantity) from chemicals;");
            $sum=mysqli_fetch_array($sql);
        
        ?>
        <?php
			
			$i = "select * from chemicals ORDER BY id";
			$h = mysqli_query($db, $i);
			while($tr =mysqli_fetch_array($h))
			{
		?>
        <tr>
        	<td><?php echo $tr[0]; ?></td>
            <td><?php echo $tr[1]; ?></td>
            <td><?php echo $tr[2]; ?></td>
            <td><?php echo ("Ksh. " . $tr[3]); ?></td>
            <td><?php echo $tr[4]; ?></td>
            <td><?php echo $tr[5]; ?></td> 
        </tr>
        
        <?php
			}
		?>
		<tr>
        <?php echo ("Total Quantity = " . implode($sum) . " Litres");?>
        
        </tr>
    </table>
    </fieldset>
    </center>
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