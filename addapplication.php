<?php
include_once "connect.php";
if(isset($_POST['submit']))
{
  $first_name = $_POST['first_name'];
  $surname = $_POST['surname'];
  $pesel = $_POST['pesel'];
  $email = $_POST['email'];
  $description_disease = $_POST['description_disease'];
  $sql = "INSERT INTO reception (first_name,surname,pesel,email,description_desease)
  VALUES ('$first_name','$surname','$pesel','$email','$description_disease')";
  $db -> query($sql);
}
mysqli_close($db);
header("refresh:0; url=reception.php");
?>