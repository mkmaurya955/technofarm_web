<?php
//start session
session_start();
include('../includes/database.php');

//database connection

$error = null;

if(isset($_POST['add']))
	{
	
	//capture the form values
    $userid=$_POST['id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$category = $_POST['category'];
	$idno = $_POST['id_no'];
	$cnty = $_POST['county'];
	$dsct = $_POST['district'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
	
	//check the user if it already exists
	$inquire="SELECT * FROM users";
	$qqr=mysqli_query($db, $inquire);
	$ris=mysqli_fetch_array($qqr);
	if($ris > 0){
		@$check = $ris['id_no'];
	}
	
	//check if the fields are empty
	if(empty($fname) || empty($mname)||empty($category) || empty($idno)||empty($cnty)||empty($dsct)||empty($password)||empty($email)||empty($tel))
	{
		$error ="Please make sure all the details have been filled before proceeding";
	}
	
	//check if user already Exists
	elseif(@$check == $idno)
	{
		$error = "The User already exists in the System!";
	}
	else
	{
	//insert the captured form details to the database
	$sql = "INSERT INTO users VALUES('$userid','$fname','$mname','$idno','$email','$tel','$cnty','$dsct','$password','$category','$date','$gender')";
	$query = mysqli_query($db, $sql);
	$result = mysqli_affected_rows($db);
	if($result > 0){
		@ $error.= "The Users details for &nbsp;".$fname."&nbsp;has been successfuly entered";
		}
	else{
		$error.="The user could not be added. please try again later.";
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
		
<script src="../javascript/validate.js"></script>
<script language="javascript">
function Validate()
{
	var fValidate=document.adduser.fname.value;
  if(fValidate=="")
  {
    alert("First name field is empty")
    return false;
  }
  
  	if(isAlpha(fValidate)==false)
	  {
	   alert("Invalid entry in the First name field.")
	   return false;
	  }
	
  
  var mValidate=document.adduser.mname.value;
  if(mValidate=="")
  {
    alert("Middle name field is empty")
    return false;
  }
  
  if(isAlpha(mValidate)==false)
	  {
	   alert("Invalid entry in the Middle name field.")
	   return false;
	  }
  
  
  var dValidate=document.adduser.id_no.value;
  if(dValidate=="")
  {
    alert("ID Number field is empty")
    return false;
  }
   else if(isDigits(dValidate)==false)
  {
   alert("Invalid entry in the Id field.")
   return false;
  }
  
  var eValidate=document.adduser.email.value;
  if(eValidate=="")
  {
  	alert("Email field is empty")
	return false;
  }
  else if(checkEmail(eValidate)==false)
		  {
		   alert("Invalid Email Format")
		   return false;
		  }
 
  
  var tValidate=document.adduser.tel.value;
  if(tValidate=="")
  {
    alert("Phone number field is empty")
    return false;
  }
  else if(isDigits(tValidate)==false)
  {
   alert("Invalid entry Phone number field.")
   return false;
  }
  
  var vcounty=document.adduser.county.value;
  if(vcounty=="")
  {
    alert("County field is empty")
    return false;
  }
  
  	if(isAlpha(vcounty)==false)
	  {
	   alert("Invalid entry in the county field.")
	   return false;
	  }
	  
	  var vdistrict=document.adduser.district.value;
  if(vdistrict=="")
  {
    alert("District field is empty")
    return false;
  }
  
  	if(isAlpha(vdistrict)==false)
	  {
	   alert("Invalid entry in the district field.")
	   return false;
	  }
	  
	  	  var vdivision=document.adduser.password.value;
  if(vdivision=="")
  {
    alert("Password field is empty")
    return false;
  }
  
	  
		  	  var vlocation=document.adduser.date.value;
  if(vlocation=="")
  {
    alert("Date field is empty")
    return false;
  }
  
  
}

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
	<div id="error">
			<?php
			if(strlen($error) > 0){
				echo $error;
			}
			?>
    </div>
	<div id="accordion">
	
	     <div>
			<fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Fill the Details of the New User</a></h3></legend>
				<div>
				<form name="adduser" onsubmit="return Validate();" action="<?php $PHP_SELF ?>" method="POST">
						<table align="center">
						
                       
            	<tr>
                
                <?php
					
					$g = mysqli_query($db, "select max(id) from users");
					while($id=mysqli_fetch_array($g))
					{
				?>
                
                	<th>User ID</th>
                    <td><input type="text" name="id" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                
                <?php
					}
				?>
                        
                        
                        
                        
						<th><label>First Name</label></th>
						<td><input type="text" name="fname" autofocus=""></td>
						<th><label>Middle Name</label></th>
						<td><input type="text" name="mname"></td>
						
						</tr>
						
						<tr>
						<th><label>National ID.No</label></th>
						<td><input type="text" name="id_no"/></td>
						<th><label>Email</label></th>
						<td><input type="email" name="email"/></td>
						<th><label>Mobile Phone</label></th>
						<td><input type="text" name="tel"></td>
						</tr>
						
						<tr>
						<th><label>County</label></th>
						<td><input type="text" name="county"/></td>
						<th><label>District</label></th>
						<td><input type="text" name="district"/></td>
						<th><label>Password*</label></th>
						<td><input type="password" name="password"/></td>
						</tr>
						
						<tr>
						<th><label>Category</label></th>
						<td>
                            <select name="category">
                                <option value="Store Clerk">Stores Clerk</option>
                                <option value="Machine Operator">Machine Operator</option>
                                <option value="Garage Attendant">Garage Attendant</option>
                                <option value="Field Operator">Field Operator</option>
                            </select>
                        </td>
                        <th><label>Date</label></th>
                        <td><input type="date" name="date"/></td>
                        <th>Gender</th>
                        <td>
                            <input type="radio" name="gender" value="Male" checked=""/>Male
                            <input type="radio" name="gender" value="Female" />Female
                        </td>
						</tr>
						
						</table>
						
						<center><input type="submit" name="add" value="Register">  
                        <input type="reset" value="Cancel" /></center>
				</form>
    </fieldset>
    
    
    
    <fieldset>
   <legend> <center><h3><a href="#" style="color:yellowgreen;">Recently added Employees In the System</a></h3></center></legend>
<table class="mytable">
<center>
    	<tr>
            <th>UserID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Category</th>
            <th>Id Number</th>
            <th>County</th>
            <th>Date Registered</th>
            <th>Gender</th>
            <th>Options</th>
    	</tr>
        <?php
			//List employees recently added in descending order
			$i = "select * from users ORDER BY id DESC LIMIT 3";
			$h = mysqli_query($db, $i);
			while($tr =mysqli_fetch_array($h))
			{
		?>
        <tr>
        	<td><?php echo $tr[0]; ?></td>
            <td><?php echo $tr[1]; ?></td>
            <td><?php echo $tr[2]; ?></td>
            <td><?php echo $tr[9]; ?></td>
            <td><?php echo $tr[3]; ?></td>
            <td><?php echo $tr[6]; ?></td>
            <td><?php echo $tr[10]; ?></td>
            <td><?php echo $tr[11]; ?></td>
            <td align="center"><a href="delete.php? id=<?php echo $tr[0];?>">Delete</a> / 
            <a href="edit.php? id=<?php echo $tr[0];?>">Edit</a> </td>    
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