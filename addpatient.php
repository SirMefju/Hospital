<?php
include_once "connect.php";
if(isset($_POST['submit']))
{
  $first_name = $_POST['first_name'];
  $surname = $_POST['surname'];
  $pesel = $_POST['pesel'];
  $date_of_birth = $_POST['date_of_birth'];
  $email = $_POST['patient_email'];
  $sql = "INSERT INTO patients (first_name,surname,pesel,date_of_birth,patient_email)
  VALUES ('$first_name','$surname','$pesel','$date_of_birth','$email')";
  $db -> query($sql);
}
mysqli_close($db);
header("refresh:0; url=patients.php");
?>