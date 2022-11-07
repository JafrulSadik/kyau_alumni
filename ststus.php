<?php
include 'DB_Connection.php';

$user_id = $_GET['user_id'];
$user_active = $_GET['user_active'];

$sql ="update user_info set user_active = '$user_active' where user_id = '$user_id'";

mysqli_query($con, $sql);

header("Location:./admin_approve.php");

?>