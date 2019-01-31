<?php
session_start();
$error =null;
include('../includes/database.php');

// $surname= $_SESSION['surname'];

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
    
    
    
<body>
<center><font size="+3" color="#5b005b" style="padding-left:130px;"  >Search Results</font></center>
<a class="addnew" href="view_users.php" style="font-face:Khmer OS Battambang; font-size:16px;">Back</a></font>
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
		$text = $_POST['txtsearch'];
		if($text==""){
			echo "Type Something....Please Try Again!!!"."<br>";
			
		}
	?>
    <?php
		$cbo = $_POST['cbosearch'];
		$search = $_POST['txtsearch'];
		//include('connect.php');
	?>
    <?php
		if($cbo=="ID Number")
		{
			$id = mysqli_query($db, "SELECT * FROM users WHERE idno like '".$search."%'");
	?>

    <?php
		while($tr=mysqli_fetch_array($id))
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
				<td align="center"><a href="delete.php? txtid=<?php echo $tr[0];?>">Delete</a> / <a href="edit.php? txtid=<?php echo $tr[0];?>">Edit</a></td>
			</tr>
            <?php
		}
		}else if($cbo=="Name")
		{
			$na = mysqli_query($db, "SELECT * FROM users WHERE fname like '".$search."%'");
	?>
    <?php
		while($an=mysqli_fetch_array($na))
		{
	?>
			<tr>
				<td><?php echo $an[0]; ?></td>
				<td><?php echo $an[1]; ?></td>
                <td><?php echo $an[2]; ?></td>
                <td><?php echo $an[9]; ?></td>
                <td><?php echo $an[3]; ?></td>
                <td><?php echo $an[6]; ?></td>
                <td><?php echo $an[10]; ?></td>
                <td><?php echo $an[11]; ?></td>
				<td align="center"><a href="delete.php? txtid=<?php echo $an[0];?>">Delete</a> / <a href="edit.php? txtid=<?php echo $an[0];?>">Edit</a></td>
			</tr>
            <?php
				}
			?>  
     <?php
		}else if($cbo=="Category")
				{
        $add = mysqli_query($db, "SELECT * FROM users WHERE category like '".$search."%'");
     ?>
		<?php
		while($dda=mysqli_fetch_array($add))
		{
		?>
			<tr>
				<td><?php echo $dda[0]; ?></td>
				<td><?php echo $dda[1]; ?></td>
                <td><?php echo $dda[2]; ?></td>
                <td><?php echo $dda[9]; ?></td>
                <td><?php echo $dda[3]; ?></td>
                <td><?php echo $dda[6]; ?></td>
                <td><?php echo $dda[10]; ?></td>
                <td><?php echo $dda[11]; ?></td>
				<td align="center"><a href="delete.php?txtid=<?php echo $dda[0];?>">Delete</a> / <a href="edit.php?txtid=<?php echo $dda[0];?>">Edit</a></td>
			</tr>
            <?php
				}
			}else if($cbo=="County")
			{
			$g = mysqli_query($db,"SELECT * FROM users WHERE county like '".$search."%'");
			?>  
			<?php
				while($co=mysqli_fetch_array($g))
				{			
			?>
            <tr>
				<td><?php echo $co[0]; ?></td>
				<td><?php echo $co[1]; ?></td>
                <td><?php echo $co[2]; ?></td>
                <td><?php echo $co[9]; ?></td>
                <td><?php echo $co[3]; ?></td>
                <td><?php echo $co[6]; ?></td>
                <td><?php echo $co[10]; ?></td>
                <td><?php echo $co[11]; ?></td>
				<td align="center"><a href="delete.php?txtid=<?php echo $co[0];?>">Delete</a> / <a href="edit.php?txtid=<?php echo $co[0];?>">Edit</a></td>
			</tr>
            
            <?php
				}
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