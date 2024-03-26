<?php session_start();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="patient_sign_up.css">
    <script defer src="DoctorsLogin.js"></script>
</head>
<body>


    <!-- <div> -->
        <!-- <img class="DoctorImage" src="images/doctor.jpg" alt="Doctor in action"> -->
    <!-- </div> -->
    <div class="form">
        <form id="form" action="processor.php" method="post">
            <p id="patientSignUp">Patients' Registration</p>
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
            <div>
                <img class="Icon" src="images/UserIcon.png" alt="User Icon">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>  <br>
                <input type="text" name="fullName"   id="exampleInputName">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>  <br>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputAge" class="form-label">Age</label>  <br>
                <input type="number" name="age" class="form-control" id="exampleInputAge" min="0">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputWeight" class="form-label">Weight</label>  <br>
                <input type="number" id="weight" name="weight" class="form-control" id="exampleInputWeight" min="0">
            </div>

            <div class="mb-3">
                <label style="margin-left: 2rem;" for="Gender" class="form-label">Gender</label><br>
                <input style="display: inline-block;" type="radio" id="Female" name="Gender" value="Female" >
                <label for="Female">Female</label>
                <input style="display: inline-block;" type="radio" id="Male" name="Gender" value="Male">
                <label for="Male">Male</label>
                <input style="display: inline-block;" type="radio" id="Other" name="Gender" value="Other">
                <label for="Other">Other</label>
            </div><br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>  <br>
                <input type="password" name="password"  class="form-control" id="exampleInputPassword1">
            </div>
            <br>

            <div style="display: flex; align-items: center;" class="check">
                <input type="checkbox">
                <p>
                    I agree to the terms of service and privacy policy
                </p>
            </div>
            <button type="submit" name="patientRegister">Sign Up</button>
            <p class="quer">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
<!--    <h1>Hey Patient/caregiver, Register to gain help from diabetes management system</h1>-->
</body>
</html>