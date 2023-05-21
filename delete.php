<?php
include 'config.php';
if(isset($_GET['delID'])){
    $id = $_GET['delID'];
    $query = "DELETE FROM `students` WHERE `students`.`id` = $id ";
    
    if(mysqli_query($conn , $query)){
        echo "<script> alert('record deleted') </script>";
        echo "<script> window.location.href = 'handleForm.php' </script>";
}
}