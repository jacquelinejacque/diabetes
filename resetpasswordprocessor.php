<?php
include 'connect.php';
include 'env.php';

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

session_start();

if (isset($_POST['forgetpassword'])) {
    $email = $_POST['email'];
    $otp=rand(999,10000);
    $checkemail="select * from patients where email='$email'";
    $checkemail_run=mysqli_query($conn,$checkemail);
    $count=mysqli_num_rows($checkemail_run);
    // var_dump($checkemail_run);
    // die();
    if($count==1) {
        $users = mysqli_fetch_all($checkemail_run, MYSQLI_ASSOC);

        //the password was correct

        $name="Diacare";
        $subject="Password reset";
        $body='<div style="background-color: green;color: white;padding-bottom: 1rem;padding-left: 1rem;" class="body">
                    <h1>Diacare </h1>
                    <p>We are writing this message because you requested a password reset</p>
                    <p>Your otp is '.$otp.'</p>
               </div>';


        $mail=new PHPMailer(true);
//    $mail->SMTPDebug=SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->SMTPAuth=true;

        $mail->Host="smtp.gmail.com";

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;


        $mail->Username= $mail_username;
        $mail->Password=$mail_password;

//    $mail->setFrom($email,$name);
        $mail->addAddress($email,$name);
//        $mail->addAttachment(true);
        $mail->isHTML(true);
        $mail->Subject=$subject;
        $mail->Body=$body;
        $mail->send();
        if($mail->send()){

            $otp="update patients set otp='$otp' where email='$email'";
            $otp_run=mysqli_query($conn,$otp);
            if($otp_run){
                $_SESSION['status'] = "Check your email for Otp to reset password";
                header("Location: resetpassword.php?email=$email");
            }
        }
        else{
            $_SESSION['status'] = "Something went wrong maybe network problem try again";
            header("location:forgetpassword.php");
        }
    }
    else{
        $checkemail2="select * from doctor where email='$email'";
        $checkemail2_run=mysqli_query($conn,$checkemail2);
        $count2=mysqli_num_rows($checkemail2_run);
        if($count2==1) {
            $users = mysqli_fetch_all($checkemail_run, MYSQLI_ASSOC);

            //the password was correct

            $name="Diacare";
            $subject="Password reset";
            $body='<div style="background-color: green;color: white;padding-bottom: 1rem;padding-left: 1rem;" class="body">
                    <h1>Diacare </h1>
                    <p>We are writing this message because you requested a password reset</p>
                    <p>Your otp is '.$otp.'</p>
               </div>';


            $mail=new PHPMailer(true);
//    $mail->SMTPDebug=SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->SMTPAuth=true;

            $mail->Host="smtp.gmail.com";

            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            $mail->Username= $mail_username;
            $mail->Password=$mail_password;

//    $mail->setFrom($email,$name);
            $mail->addAddress($email,$name);
//        $mail->addAttachment(true);
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body=$body;
            $mail->send();
            if($mail->send()){
                $otp="update doctor set otp='$otp' where email='$email'";
                $otp_run=mysqli_query($conn,$otp);
                if($otp_run){
                    $_SESSION['status'] = "Check your email for Otp to reset password";
                    header("Location: resetpassword.php?email=$email");
                }
            }
            else{
                $_SESSION['status'] = "Something went wrong maybe network problem try again later";
                header("location:forgetpassword.php");
            }
        }
      else {
          $_SESSION['status'] = "Email does not exist?";
          header("location:forgetpassword.php");
      }
    }

}

if (isset($_POST['resetpassword'])) {
    $email=$_POST['email'];
    $otp=$_POST['otp'];

    $password =md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    if($password !== $confirmpassword) {
        session_start();
        $_SESSION['status'] = "Password do not match?";

        header("location:resetpassword.php");
    }
    else{
        $check="select * from patients where email='$email'";
        $check_run=mysqli_query($conn,$check);
        $countexist=mysqli_num_rows($check_run);
                if($countexist==1) {
//                echo$email;
//                echo$otp;
//                echo "Password do not match";
//                die();
                    $changepassword = "UPDATE patients SET password='$password' WHERE email='$email' and otp='$otp'";
                    $changepassword_run = mysqli_query($conn, $changepassword);

                    if ($changepassword_run) {
                        session_start();
                        $_SESSION['status'] = "Password changed successfully";

                        header("location:login.php");
                    } else {
                        session_start();
                        $_SESSION['status'] = "Credentials does not match check try again to reset";
                        header("location:resetpassword.php");
                    }
                }
              else{
//                  echo 'doc';
//                  echo$email;
//                  echo$otp;
//                  echo "Password do not match";
//                  die();
                  $changepassword = "UPDATE doctor SET password='$password' WHERE email='$email' and otp='$otp'";
                  $changepassword_run = mysqli_query($conn, $changepassword);
//                    var_dump($changepassword_run);
//                    die();
                  if ($changepassword_run) {
                      session_start();
                      $_SESSION['status'] = "Password changed successfully";
                      header("location:login.php");
                  } else {
                      session_start();
                      $_SESSION['status'] = "Credentials does not match check try again to reset";
                      header("location:resetpassword.php");
                  }
              }
    }

}
?>