<?php
session_start();
if(isset($_SESSION["email"]))
	{
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$name = $_SESSION['name'];
$db->close();
  }
else
{
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang = "en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="project.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
    <title>
  View groups
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
  <h2 class = "profileBorder">
  <tr>
  <td>
<i class="fa-solid fa-book-atlas"></i> <a href="testoverview.php" >  Take Test </a> 
    </td>
    </tr>
    <tr>
    <td>
       <?php
      echo $name;
          ?>
          </a> 
    </td>
    </tr>
  </h2>
  <table class = "messengerWindow2">
<tr>
<td colspan = "2">
 <?php echo $error;?>
</td>
</tr>
  
 <?php
	$db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$q9 = "SELECT Ranks.rankid FROM Ranks, Profile WHERE Profile.profile_id = '$id'";
$r9 = $db->query($q9);
$rankrow = $r9->fetch_assoc();
$rankt =  $rankrow["rankid"];
$q1 = "SELECT  Groups.groupname,Groups.group_id, FROM Groups, Ranks, Members WHERE Members.groupsid = Groups.groupsid AND Groups.ranktag LIKE '%$rankt%';
$result = mysqli_query($db,$q1);
echo "<table>";
 while($row = mysqli_fetch_assoc($result)) {   
echo "<tr class = 'borderelement2'>";
echo "<td>";
	  echo "<a href='group.php?a=$groupname&b=$cooltag' >
	  echo "</td>";
	  echo "</tr>";
}
?>
<tr>
    <td class = "borderelement2" colspan = "2">
    <a href="creategroup.php" > <i class="fa-solid fa-user-group"></i> Create  </a>
  </td>
</tr>

    </table>
  <h2 class = "profileBorder"> 
  <table>
  <tr>
  <td>
  <i class="fa-solid fa-car"></i> 
  </td>
  <td>
   <a href="index.php"> Logout </a>
  </td>
  <td colspan = "5">
  </td>
  <td>
<i class="fa-solid fa-circle-play"></i>
  </td>
  </tr>
  </table>
  </h2>
<br>
</div>
</body>
</html>
