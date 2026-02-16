<?php 
  include ("../misc/connect.php");

    if (isset($_GET['id'])){
      $id = $_GET['id'];

      $sql = "DELETE FROM item WHERE id=?";
      $stmt = $conn -> prepare($sql);
      $stmt -> bind_param("i", $id);
      $stmt -> execute();

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