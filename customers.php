<?php include 'includes/config.php'?>
<?php include 'includes/header.php'?>
<h3><?=$config->pageID?></h3>
<?php
    
$sql = "select * from test_Customers";      //important to remember

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))     //important to remember the while loop
    {
	   echo "<p>";
	   echo "FirstName: <b>" . $row['FirstName'] . "</b><br />";
	   echo "LastName: <b>" . $row['LastName'] . "</b><br />";
	   echo "Email: <b>" . $row['Email'] . "</b><br />";
	   echo "</p>";
    }
}else{//no records
	echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database
  
?>
<?php include 'includes/footer.php'?>