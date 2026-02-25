<?php 
  include ("../misc/connect.php");

    if (isset($_GET['id'])){
      $id = $_GET['id'];

      $sql = "DELETE FROM categories WHERE id=?";
      $stmt = $conn -> prepare($sql);
      $stmt -> bind_param("i", $id);
      $stmt -> execute();

      echo"
      <script>
          alert('Category Deleted Successfully!');
          window.location.href = 'view.php';
      </script>";
      
      } else {
        echo"<script>alert('Error Deleting Category!');</script>".$conn->connect_error;
      }
      $conn->close();

?>