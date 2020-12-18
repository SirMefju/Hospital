<?php
include_once "connect.php";
if(isset($_POST['submit']))
{
  $doctor_name = $_POST['doctor_name'];
  $doctor_surname = $_POST['doctor_surname'];
  $doctor_specialization = $_POST['doctor_specialization'];
  $patient_name = $_POST['patient_name'];
  $patient_surname = $_POST['patient_surname'];
  $patient_pesel = $_POST['patient_pesel'];
  $patient_date_of_birth = $_POST['patient_date_of_birth'];
  $patient_email = $_POST['patient_email'];
  $visit_date = $_POST['visit_date'];
  $sql = "INSERT INTO visit (doctor_name, doctor_surname, doctor_specialization, patient_name, patient_surname, patient_pesel, patient_date_of_birth, patient_email, visit_date)
  VALUES ('$doctor_name','$doctor_surname','$doctor_specialization','$patient_name','$patient_surname','$patient_pesel','$patient_date_of_birth','$patient_email','$visit_date')";
  $db -> query($sql);
  $subject = 'Visit in Hospital';
  $message = 'Your visit in hospital will be '.$visit_date.' at the doctor '.$doctor_name." ".$doctor_surname;
  $headers =
    "Content-Type: text/plain; charset=UTF-8" . "\r\n" .
    "MIME-Version: 1.0" . "\r\n" .
    "From: $from" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
  mail($patient_email,$subject,$message,$headers);
}
mysqli_close($db);
header("refresh:0; url=visits.php");
?>