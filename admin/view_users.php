<?php
session_start();
$error =null;
include('../includes/database.php');
//$fname= $_SESSION['fname'];

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
		<font size="+1" color="#5b005b" style="padding-left:130px;">The following is the list of all Employees in the farm:-</font>
		
        	<div class="search">
	<form method="post" action="search.php">
    <select name="cbosearch">
    	<option>ID Number</option>
    	<option>Name</option>
        <option>Category</option>
        <option>County</option>
    </select>
	<input type="text" name="txtsearch" placeholder="Type to Search" />
    <input type="submit" name="cmdsearch" value="Search" autofocus=""/>
    </form>
    </div>
   
	<table class="mytable">
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
			
			$i = "select * from users";
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