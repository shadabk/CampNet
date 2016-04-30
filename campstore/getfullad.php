<?php
session_start();
$rownum = $_REQUEST['rownum'];
$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp') or die('Error');
$userid = $_SESSION['user_id'];
$query = "SELECT * FROM ads_list WHERE college='$college' and branch='$branch' and year=$year ORDER BY ad_sr DESC";
$result = mysqli_query($db, $query);
for($i = 0; i <= $rownum; $i = $i + 1){
  $r = mysqli_fetch_assoc($result);
}
echo $r;
?>
