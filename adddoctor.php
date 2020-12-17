<?php
include_once "connect.php";
if(isset($_POST['submit']))
{
  $name = $_POST['first_name'];
  $surname = $_POST['surname'];
  $specialization = $_POST['specialization'];
  $sql = "INSERT INTO doctors (first_name,surname,specialization)
  VALUES ('$first_name','$surname','$specialization')";
  $db -> query($sql);
}
mysqli_close($db);
header("refresh:0; url=doctors.php");
?>