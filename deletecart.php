<?php $id = $_GET['id'];
include "connect.php";
mysqli_query($con,"delete from addlist where id='$id'");
header("location:view.php");
?>