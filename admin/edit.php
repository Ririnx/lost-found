<?php

    include("../misc/connect.php");

    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $lastname =$_POST['lastname'];
        $firstname =$_POST['firstname'];
        $email =$_POST['email'];
        $phone =$_POST['phone'];
        $address =$_POST['address'];

        

        $sql = "UPDATE students SET 
                        lastName= '$lastname',
                        firstName='$firstname',
                        email='$email',
                        phone='$phone',
                        address='$address'

                        WHERE id ='$id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script>
                    alert('Data Updated Successfully');
                    window.location.href='view.php';
            
            </script>    
            ";      
        }
    }

?>