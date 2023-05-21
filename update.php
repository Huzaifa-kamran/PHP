<?php

include "header.php";

$id = $_GET["stdID"];

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    $fileName = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];

    if ($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg' || empty($fileName)) {
         if (empty($fileName)) {
          $update = "UPDATE `students` SET `firstName` = '$fname',
          `lastName` = '$lname', `email`= '$email' ,`address`= '$address' ,   
          `state` = '$state', `city` = '$city' ,`gender` = '$gender' WHERE `id` = $id";
        $updateQuery = mysqli_query($conn, $update);
        if ($updateQuery) {
          echo "<script> alert('Data Update Successfully.') </script>";
          echo "<script> window.location.href = 'handleForm.php' </script>";
      } else {
          echo "<script> alert('An error occurred while updating the student information.') </script>";
          echo "<script> window.location.href = 'update.php?stdID=$id' </script>";
      }
         }else{
          $update = "UPDATE `students` SET `firstName` = '$fname',
             `lastName` = '$lname', `email`= '$email' ,`address`= '$address' ,   
             `state` = '$state', `city` = '$city' ,`gender` = '$gender',
             `image` = '$fileName' WHERE `id` = $id";
             $updateQuery = mysqli_query($conn,$update);
             if($updateQuery){
              if (move_uploaded_file($tmpName, 'uploads/' . $fileName)) {
                echo "<script> alert('Data Update Successfully.') </script>";
                        echo "<script> window.location.href = 'handleForm.php' </script>";
                    }else {
                      echo "<script> alert('An error occurred while updating the student information.') </script>";
                      echo "<script> window.location.href = 'update.php?stdID=$id' </script>";
                  }
             }
         }
        // $update = "UPDATE `students` SET `firstName` = '$fname',
        //     `lastName` = '$lname', `email`= '$email' ,`address`= '$address' ,   
        //     `state` = '$state', `city` = '$city' ,`gender` = '$gender',
        //     `image` = '$fileName' WHERE `id` = $id";
        // $updateQuery = mysqli_query($conn, $update);

        // if ($updateQuery) {
        //     if (move_uploaded_file($tmpName, 'uploads/' . $fileName)) {
        //       
        //         echo "<script> window.location.href = 'handleForm.php' </script>";
        //     }
        // } else {
        //     echo "<script> alert('An error occurred while updating the student information.') </script>";
        //     echo "<script> window.location.href = 'update.php?stdID=$id' </script>";
        // }
    } else {
        echo "<script> alert('Please use a supported file format: JPG, JPEG, or PNG.') </script>";
        echo "<script> window.location.href = 'update.php?stdID=$id' </script>";
    }
}

if (isset($_GET["stdID"])) {
    $query = "SELECT * FROM `students` WHERE `id` = $id";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($res);
?>

    <div class="container">
        <div class="title">Update</div>
        <form action="update.php?stdID=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="user__details">
                <input type="hidden" name="studentID" value="<?php echo $data['id'] ?>">
                <div class="input__box">
                    <span class="details">First Name</span>
                    <input type="text" name="fname" value="<?php echo $data['firstName'] ?>" required>
                </div>
                <div class="input__box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" value="<?php echo $data['lastName'] ?>" required>
                </div>
                <div class="input__box">
                    <span class="details">Email</span>
                    <input type="email" name="email" value="<?php echo $data['email'] ?>" required>
                </div>
                <div class="input__box">
                    <span class="details">Address</span>
                    <input type="text" name="address" value="<?php echo $data['address'] ?>" required>
                </div>
                <div class="input__box">
                    <div class="mb-3">
                        <label for="" class="form-label">City</label>
                        <select class="form-select form-select-lg" name="city" required>
                            <option value="KHI" <?php if ($data['city'] == 'KHI') {
                                                    echo "selected";
                                                } ?>>Karachi</option>
                            <option value="LHR" <?php if ($data['city'] == 'LHR') {
                                                    echo "selected";
                                                } ?>>Lahore</option>
                            <option value="ISB" <?php if ($data['city'] == 'ISB') {
                                                    echo "selected";
                                                } ?>>Islamabad</option>
                        </select>
                    </div>
                </div>
                <div class="input__box">
                    <div class="mb-3">
                        <label for="" class="form-label">State</label>
                        <select class="form-select form-select-lg" name="state" required>
                            <option value="">Select State</option>
                            <option value="Sindh" <?php if ($data['state'] == 'Sindh') {
                                                        echo "selected";
                                                    } ?>>Sindh</option>
                            <option value="Punjab" <?php if ($data['state'] == 'Punjab') {
                                                        echo "selected";
                                                    } ?>>Punjab</option>
                            <option value="KPK" <?php if ($data['state'] == 'KPK') {
                                                        echo "selected";
                                                    } ?>>KPK</option>
                        </select>
                    </div>
                </div>
                <div class="input__box">
                    <span class="details">Select Image</span>
                    <span>Image:  <?php echo $data['image'] ?></span>
                    <input type="file" style="padding-top: 8px;" value="<?php echo $data['image'] ?>" name="img">
                </div>
            </div>
            <div class="gender__details">
                <input type="radio" name="gender" value="male" <?php if ($data['gender'] == 'male') {
                                                                    echo 'checked';
                                                                } ?> id="dot-1">
                <input type="radio" name="gender" value="female" <?php if ($data['gender'] == 'female') {
                                                                        echo 'checked';
                                                                    } ?> id="dot-2">
                <input type="radio" name="gender" value="others" <?php if ($data['gender'] == 'others') {
                                                                        echo 'checked';
                                                                    } ?> id="dot-3">
                <span class="gender__title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span>Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span>Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span>Others</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <button type="submit" name="update">Update</button>
            </div>
        </form>
    </div>

<?php
} else {
    echo "<script> window.location.href = 'handleForm.php' </script>";
}

include "footer.php";
mysqli_close($conn);
?>
