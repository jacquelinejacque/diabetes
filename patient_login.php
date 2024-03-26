<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="PatientsLogin.css">
    <script defer src="DoctorsLogin.js"></script>
</head>

<body>
    <?php
        include 'navbar.php'
    ?>
    <!-- <div> -->
    <!-- <img class="DoctorImage" src="images/doctor.jpg" alt="Doctor in action"> -->
    <!-- </div> -->
    <div>
        <form id="form" action="processor.php" method="get" >
            <p class="DoctorsLogin">Patients' Login</p>
            <div>
                <img class="Icon" src="images/UserIcon.png" alt="User Icon">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="fullName" class="form-control" id="exampleInputName">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" id="password"  class="form-control" id="exampleInputPassword1">
            </div><br>
            <div class="mb-3 form-check">
                <input type="checkbox" id="check" class="form-check-input" id="exampleCheck1">
                <label class="check" for="exampleCheck1">I agree to the terms of service and privacy
                    policy</label>
            </div>
            <div id="error"></div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="quer">Forgot passwword?</p>
            <button type="submit" class="btn btn-primary">Forget Password</button>
            <p class="quer">Have no account?</p>
            <button type="submit" class="btn btn-primary" onclick="window.location.href = 'patient_sign_up.php'">Sign Up</button>
        </form>
    </div>
    <h1>Hey Patient/caregiver, Login to gain help from diabetes management system</h1>
</body>

</html>