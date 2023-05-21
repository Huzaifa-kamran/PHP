<?php 
include "config.php";
include "header.php";
isset($_POST["register"]) ;
if(isset($_POST["register"])){

?>


<?php

$fname =   $_POST['fname'];
$lname =   $_POST['lname'];
$email =   $_POST['email'];
$address =   $_POST['address'];
$city =   $_POST['city'];
$state =   $_POST['state'];
$gender =   $_POST['gender'];
$fileName = $_FILES['img']['name'];
$tmpName = $_FILES['img']['tmp_name'];
$type = $_FILES['img']['type'];

if ($fname == "" || $lname == "" || $address == "" || $gender == "" || $city == "") {

    echo "<script> alert('please fill all the form fields') </script>";
} else {
    if ($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg') {
        $query = "INSERT INTO `students` (`firstName`, `lastName`, `email`, `address`, `city`, `state`, `gender`,
     `image`) VALUES ('$fname', '$lname', '$email', '$address', '$city', '$state', '$gender', '$fileName')";
     $res = mysqli_query($conn,$query);

        if (move_uploaded_file($tmpName, 'uploads/' . $fileName)) {


            echo "<script> alert('Data Inserted') </script>";
        }
    }else {
        echo "<script> alert('Please use supported file format, JPG , JPEG or PNG') </script>";
        echo "<script> window.location.href = 'index.php' </script>";
    }
    

    //  if($res){

    
         ?>




      <?php 
        

    //  }else{
    //     echo "<script> alert('error') </script>";


    //  }
}
  
 
    
    
    ?>


<?php 
    }else{
        // echo "<script> window.location.href = 'index.php' </script>";
    }
    $select = "SELECT * FROM `students`";
    $result = mysqli_query($conn,$select);
    ?>
<div class="container">
<table class="table">
  <thead class="table-light">
  <tr>
    <th>ID</th>
    <th>Fisrt Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Image</th>
    <th>Edit/Delete</th>
</tr>
  </thead>
  <tbody>


<?php 
while ($row = mysqli_fetch_assoc($result)) {
  ?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['firstName']?></td>
<td><?php echo $row['lastName']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['address']?></td>
<td><?php echo $row['state']?></td>
<td><?php echo $row['city']?></td>
<td><img height="100" width="100" src="uploads/<?php echo $row['image']?>" alt=""> </td>
<td> <a href="update.php?stdID=<?php echo $row['id']?>"><button class="btn btn-primary"> Update </button></a> 
 <a href="delete.php?delID=<?php echo $row['id']?>"><button class="btn btn-danger"> Delete </button></a> </td>



</tr>


<?php 
}
?>



</tbody>

</table>
</div>

    <?php 
    
    include "footer.php";
            ?>