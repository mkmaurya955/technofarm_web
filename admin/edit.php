<?php    
    //capture the form values


$error =null;
include('../includes/database.php');

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
   
   
   
   	<?php
		
			$id = $_GET['id'];
			
			$i = "select * from users where id=".$id;
			$h = mysqli_query($db, $i);
			if($tr=mysqli_fetch_array($h))
			{
		?>
    
	<table>
    		<form method="post" action="">
    	<tr>
        	<th>User ID:</th>
            <td><input type="text" name="id" value="<?php echo $tr[0]; ?>" /></td>
       
        	<th>First Name:</th>
            <td><input type="text" name="fname" value="<?php echo $tr[1]; ?>"/></td>
       
        	<th>Middle Name:</th>
            <td><input type="text" name="mname" value="<?php echo $tr[2]; ?>" /></td>
        </tr>
        <tr>
        	<th>ID Number:</th>
            <td><input type="text" name="id_no" value="<?php echo $tr[3]; ?>" /></td>
        
        	<th>E-mail:</th>
            <td><input type="email" name="email" value="<?php echo $tr[4]; ?>"/></td>
        
        	<th>Mobile Number:</th>
            <td><input type="text" name="tel" value="<?php echo $tr[5]; ?>" /></td>
        </tr>
        <tr>
        	<th>County:</th>
            <td><input type="text" name="county" value="<?php echo $tr[6]; ?>" /></td>
       
        	<th>District:</th>
            <td><input type="text" name="district" value="<?php echo $tr[7]; ?>" /></td>
        
        	<th>Password:</th>
            <td><input type="password" name="password" value="<?php echo $tr[8]; ?>" /></td>
        </tr>
        <tr>
        	<th>Category:</th>
            <td><input type="text" name="category" value="<?php echo $tr[9]; ?>" /></td>
        
        	<th>Date Registered:</th>
            <td><input type="date" name="date" value="<?php echo $tr[10]; ?>" /></td>
        
        <th>Gender:</th>
                        <td>
                            <input type="radio" name="gender" value="Male" />Male
                            <input type="radio" name="gender" value="Female" />Female
                        </td>
	   </tr>
        <?php
			}
		?>
       
        
            <td colspan="5" align="center">
            <input type="submit" name="cmdedit" value="Save" />
            <a href="view_users.php"><input type="button" value="Back" /></a>
            
          
        	</form>
    </table></center>
	</div>
   
        <?php
       $i = mysqli_query($db, "UPDATE users SET fname='".$_POST['fname']."', mname='".$_POST['mname']."', id_no='".$_POST['id_no']."', email='".$_POST['email']."', tel='".$_POST['tel']."', county='".$_POST['county']."',district='".$_POST['district']."',password='".$_POST['password']."',category='".$_POST['category']."',date='".$_POST['date']."',gender='".$_POST['gender']."' where id=".$_POST['id'] " ");
        if($i==true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_users.php">';
        }
        //header('Location::index.php');
        //exit;
        //mysql_close();
    ?>
   
   
   
   
   
   
	
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