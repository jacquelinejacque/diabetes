<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login into your account</title>
    <link rel="stylesheet" href="doctor_sign_up.css">
</head>
<body>

    <!-- <div> -->
        <!-- <img class="DoctorImage" src="images/doctor.jpg" alt="Doctor in action"> -->
    <!-- </div> -->
    <style>
        input{
            display: block;
            height:6rem;
            border: none;
            border-bottom: 1px solid #7F6FDE;
            outline-color: #FFFFFF;
        }
        label{
            font-size:24px;
        }
    </style>
    <div style="margin-top: 2rem;">
        <a style="background: gray; padding: 1rem; text-decoration: none;" href="index.php">Go back</a>
        <form id="form" action="processor.php" method="POST">

            <p class="DoctorsLogin">Login To proceed</p>
                <div class="">
                    <?php
                    if(isset($_SESSION['status'])){
                        ?>
                        <div>
                            <p style="color:gray;" class=""><?php echo $_SESSION['status']; ?> ?</p>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>
            <div>
                <img class="Icon" src="images/UserIcon.png" alt="User Icon">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <p>Forget Password <a href="forgetpassword.php">click here to reset</a></p>
            <p class="">Have no account? <a href="redirect.php">Sign Up</a></p>
        </form>
    </div>
<!--    <h1>Hey Jackie, Welcome back to Diacare management system</h1>-->
</body>
</html>