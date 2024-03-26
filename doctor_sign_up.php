<?php
include 'processor.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors sign up</title>
    <link rel="stylesheet" type="text/css" href="doctor_sign_up.css">
    <script defer src="DoctorsLogin.js"></script>
</head>
<body>

    <!-- <div> -->
        <!-- <img class="DoctorImage" src="images/doctor.jpg" alt="Doctor in action"> -->
    <!-- </div> -->
    <div style="margin-top: 2rem;">
        <a style="background: gray; padding: 1rem; text-decoration: none;" href="/">Go Home</a>

        <form id="form" action="processor.php" method="POST">
            <p class="doctor">Doctors Registration</p>


<?php
  if(isset($_SESSION['status'])){
      ?>
      <div>
          <p style="color:red;" class=""><?php echo $_SESSION['status']; ?> ?</p>
      </div>
      <?php
      unset($_SESSION['status']);
  }
  ?>

            <style>
                input{
                    display: block;
                    border: none;
                    border-bottom: 1px solid #f0f0f0;
                    height: 4rem;
                }
            </style>
     
     <div>
                <img  class="Icon" src="images/UserIcon.png" alt="User Icon">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label><br>
                <input type="text" id="fullName" name="fullName" class="form-control" id="exampleInputName">
                <!-- <span style="color: red;"><?php echo $nameError?></span> -->
                <!-- <div id="error"></div> -->
            </div><br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label><br>
                <input type="email" id="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <!-- <span style="color: red;"><?php echo $emailError?></span> -->
                <!-- <div id="error"></div> -->
            </div><br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label><br>
                <input type="password"  id="password" name="password" class="form-control" id="exampleInputPassword1">
                <input style="display: none" type="text"   name="role" value="doctor" hidden="">
                <!-- <span style="color: red;"><?php echo $passwordError?></span> -->
            </div><br>
            <div class="mb-3 form-check">
                <input type="checkbox" id="check" name="check" id="exampleCheck1" class="checkbox">
                <label class="check" for="exampleCheck1">I agree to the terms of service and privacy policy</label>
                 <!-- <span style="color: red;"><?php echo $checkError?></span> -->
            </div>
            <button type="submit" name="registerDoctor" class="btn btn-primary">Register</button>
            <p class="quer">Already have an account?        <a href="login.php" type="submit" class="btn btn-primary"  onclick="window.location.href = 'DoctorsLogin.html'">Login Here </a>
             </p>


            <div id="error"></div>
        </form>
    </div>
</body>
</html>