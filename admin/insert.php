<?php 
  include ("../misc/connect.php");

  $studentNumber=$_POST['studentNumber'];
  $lastName=$_POST['lastname'];
  $firstName=$_POST['firstname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];

  $sql = "INSERT into students (student_number, lastName, firstName, email, phone, address) VALUES (?,?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("isssis", $studentNumber, $lastName, $firstName, $email, $phone, $address);

  if ($stmt->execute()){
      echo"
      <script>
          alert('Data Submitted Successfully!');
          window.location.href = 'view.php';
      </script>";
  } else {
      echo"<script>alert('Error Submitting Data!');</script>".$conn->connect_error;
  }

  $conn->close();
?>