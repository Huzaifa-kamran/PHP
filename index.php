<?php include "header.php" ?>
<body id="indexBody">
  
<div class="container " id="indCont">
  <div class="title">Registration</div>
  <form action="handleForm.php" method="post" enctype="multipart/form-data">
    <div class="user__details">
      <div class="input__box">
        <span class="details">First Name</span>
        <input type="text" name="fname" placeholder="" value="<?php echo @$_POST['fname'] ?>" >
      </div>
      <div class="input__box">
        <span class="details">Last Name</span>
        <input type="text" name="lname" placeholder="" value="<?php echo @$_POST['lname'] ?>">
      </div>
      <div class="input__box">
        <span class="details">Email</span>
        <input type="email" name="email" required value="<?php echo @$_POST['email'] ?>">
      </div>
      <div class="input__box">
        <span class="details">Address</span>
        <input type="text" name="address" required value="<?php echo @$_POST['address'] ?>">
      </div>
      <div class="input__box">
        <div class="mb-3">
          <label for="" class="form-label">City</label>
          <select class="form-select form-select-lg" name="city" value="<?php echo @$_POST['city'] ?>">
            <option >Select City</option>
            <option value="KHI">Karachi</option>
            <option value="LHR">Lahore</option>
            <option value="ISB">Islamabad</option>
          </select>
        </div>
      </div>
      <div class="input__box">
        <div class="mb-3">
          <label for="" class="form-label">State</label>
          <select class="form-select form-select-lg" name="state" value="<?php echo @$_POST['state'] ?>">
            <option value="">Select State</option>
            <option value="Sindh">Sindh</option>
            <option value="Punjab">Punjab</option>
            <option value="KPK">KPK</option>
          </select>
        </div>
      </div>
      <div class="input__box" >
      <span class="details">Select Image</span>
        <input type="file" style="padding-top: 8px;" name="img">
      </div>
    </div>
    <div class="gender__details">
      <input type="radio" name="gender" value="male" id="dot-1">
      <input type="radio" name="gender" value="female" id="dot-2">
      <input type="radio" name="gender" value="others" id="dot-3">
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
      <button type="submit" name="register" >Register</button>
    </div>
  </form>
</div>

</body>
<?php include "footer.php" ?>