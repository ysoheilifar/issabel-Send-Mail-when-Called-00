<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<?php

ob_start();

$hostname = "localhost";
$username = "root";
$password = "pass_of_root";
$db = "asteriskcdrdb";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

?>

<table border="1" align="center">
<tr>
  <td><center>calldate</center></td>
  <td><center>src</center></td>
  <td><center>dst</center></td>
  <td><center>duration(s)</center></td>
  <td><center>disposition</center></td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT * FROM cdr where dst like '900%' order by calldate desc")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><center>{$row['calldate']}</center></td>
    <td><center>{$row['src']}</center></td>
    <td><center>{$row['dst']}</center></td>
    <td><center>{$row['duration']}</center></td>
    <td><center>{$row['disposition']}</center></td>
   </tr>\n";

}

file_put_contents('checkcdr00.html', ob_get_contents());
ob_end_flush();

?>
</table>
</body>
</html>
