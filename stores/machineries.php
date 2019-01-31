<?php
//start session
session_start();
include('../includes/database.php');


$error = null;

if(isset($_POST['add']))
	{
	
	//capture the form values
    $batchid=$_POST['id'];
	$snumber = $_POST['snumber'];
	$pname = $_POST['pname'];
	$category = $_POST['category'];
	$pdate = $_POST['pdate'];
	$price = $_POST['price'];
	
	
	//check the equipment if it already exists
	$compare="SELECT * FROM machinery";
	$qqr=mysqli_query($db, $compare);
	$fetch=mysqli_fetch_array($qqr);
	if($fetch > 0){
		@$check ==$fetch['snumber'];
	}
	
	//check if the fields are empty
	if(empty($snumber) ||empty($pname) || empty($category)||empty($pdate)||empty($price))
	{
		$error ="Fill all the details before proceeding!!";
	}
	
	//check if user already Exists
	elseif(@$check == $snumber)
	{
		$error = "The Item already exists in the System!";
	}
	else
	{
	//insert the captured form details to the database
	$sql = "INSERT INTO machinery VALUES('$batchid','$snumber','$pname','$category','$pdate','$price')";
	$query = mysqli_query($db, $sql);
	$result = mysqli_affected_rows($db);
	if($result > 0){
		@ $error.= "The details for &nbsp;".$pname."&nbsp;has been successfuly entered";
		}
	else{
		$error.="The Item Could not be added!!";
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
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Fill the Details of the Equipment</a></h3></legend>
				<div>
				<form name="machinery" action="" method="post">
						<table align="center">
						
                       
            	<tr>
                
                <?php
					
					$g = mysqli_query($db, "select max(id) from machinery"); //Count the number of Machines the table
					while($id=mysqli_fetch_array($g))
					{
				?>
                
                	<th>Batch ID</th>
                    <td><input type="text" name="id" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                
                <?php
					}
				?>
                        
                        
                        
                        
						<th><label>Serial Number</label></th>
						<td><input type="text" name="snumber" autofocus="" required=""></td>
						<th><label>Product Name</label></th>
						<td><input type="text" name="pname" placeholder="E.g John deere, Massey Ferguson"></td>
						
						</tr>
						
						<tr>
						<th><label>Category</label></th>
						<td>
                            <select name="category">
                                <option value="Tractors">Tractors</option>
                                <option value="Harvestors">Harvestors</option>
                                <option value="Trucks">Trucks</option>
                                <option value="Spraying">Spraying</option>
                                <option value="Tillage">Tillage</option>
                                <option value="Seeding">Seeding</option>
                            </select>
                        </td>
						<th><label>Purchase Date</label></th>
						<td><input type="date" name="pdate"/></td>
						<th><label>Purchase Price</label></th>
						<td><input type="text" name="price" required="" placeholder="KSh."></td>
						</tr>
                        
						</table>
						
						<center>
                                <input type="submit" name="add" value="Add">  
                                <input type="reset" value="Cancel" />
                                
                        </center>
				</form>
    </fieldset>
    
    
    
    <fieldset>
   <legend> <center><h3><a href="#" style="color:blueviolet;">Farm Equipment:</a></h3></center></legend>
<table class="mytable" style=" margin-left: 150px;">
<center>
    	<tr>
            <th>Batch ID</th>
            <th>Serial No</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Purchase Date</th>
            <th>Price</th>
           
    	</tr>
        <?php
			//List employees recently added in descending order
			$i = "select * from machinery ORDER BY id";
			$h = mysqli_query($db, $i);
			while($tr =mysqli_fetch_array($h))
			{
		?>
        <tr>
        	<td><?php echo $tr[0]; ?></td>
            <td><?php echo $tr[1]; ?></td>
            <td><?php echo $tr[2]; ?></td>
            <td><?php echo $tr[3]; ?></td>
            <td><?php echo $tr[4]; ?></td>
            <td><?php echo $tr[5]; ?></td>
              
        </tr>
        
        <?php
			}
		?>
		
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