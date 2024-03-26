<?php
include 'connect.php';
// $nameError="";
// $emailError="";
// $passwordError="";
// $checkError="";

if (isset($_POST['registerDoctor'])){
    session_start();
    $fullName=$_POST['fullName'];
    $email=$_POST['email'];
     $role=$_POST['role'];
    $password=md5($_POST['password']);
    // $check=$_POST['check'];

    if($fullName == "" || $email == "" || $password == "" || $role == "" ){
         $_SESSION['status']="All credentials are required";
        header("location: doctor_sign_up.php");
        die();
    }
      else{
              $sql="SELECT fullName from doctor where  email='$email'";
                 $result=mysqli_query($conn, $sql);
                 // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $count=mysqli_num_rows($result);
                 if ($count==1) {
                     $_SESSION['status']="Email already exist";
                     header("location: doctor_sign_up.php");
                     die();
                 }
                 else {
                     $save = "insert into doctor(fullName,email,role,password) values('$fullName','$email','$role','$password')";
                     $res = mysqli_query($conn, $save);
                     if ($res) {
                     $_SESSION['status'] = 'Registered Successfully  now login to your acccount';
                     header("location:login.php");
                     }  
                     else {
                         echo "Failed";
                         $_SESSION['status'] = 'Something went wrong';
                         header("location:doctor_sign_up.php");
                        }
                    }
            } 

     
     
     
     
     
     
    
    }
if (isset($_POST['patientRegister'])){
    session_start();
    $fullName=$_POST['fullName'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $weight=$_POST['weight'];
     $gender=$_POST['Gender'];
    $password=md5($_POST['password']);
    // $check=$_POST['check'];

    if($fullName == "" || $email == "" || $password == "" || $weight==""  ){
         $_SESSION['status']="All credentials are required";
        header("location: patient_sign_up.php");
        die();
    }
      else{
              $sql="SELECT fullName from patients where  email='$email'";
                 $result=mysqli_query($conn, $sql);
                 // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $count=mysqli_num_rows($result);
                 if ($count==1) {
                     $_SESSION['status']="Email already exist";
                     header("location: patient_sign_up.php");
                     die();
                 }
                 else {
                     $save = "insert into patients(fullName,email,age,weight,Gender,role,password) values('$fullName','$email','$age','$weight','$gender','patient','$password')";
                     $res = mysqli_query($conn, $save);
                     if ($res) {
                     $_SESSION['status'] = 'Registered Successfully  now login to your acccount';
                     header("location:login.php");
                     }
                     else {
                         $_SESSION['status'] = 'Something went wrong';
                         header("location:patient_sign_up.php");
                        }
                    }
            }

    }

    
    //  if(strlen($password<=8)){
        //  $passwordError= "<br/>At least 8 digits are required";
    //  }elseif (!preg_match('#[0-9]+#', $password)) {
        //  $passwordError= "<br/>At least one digit is required";
    //  }elseif (!preg_match('#[A-Z]+#', $password)) {
        //  $passwordError= "<br/>At least one uppercase is required";
    //  }elseif (!preg_match('#[a-z]+#', $password)) {
        //  $passwordError= "<br/>At least one lowercase is required";
    //  }
    
    // Check if the checkbox is checked
    // if(isset($_POST['check'], $check) && $_POST['check'] == 'on') {
        // Checkbox is checked, process the form data
        // exit;
    // } else {
        // $checkError="<br/>Please agree to the terms before submitting";
    // }
    


    if (isset($_POST['login'])) {
        session_start();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "select fullName from doctor where email='$email' && password='$password'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    

    if ($count == 1) {
        $find = "select * from doctor where email='$email'";
        $retrieve = mysqli_query($conn, $find);
        $doctors = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);

        //the password was correct
        foreach ($doctors as $doctor) {
            $fullName = $doctor['fullName'];
            $role = $doctor['role'];
            $doctor_id = $doctor['doctor_id'];
        }
        $_SESSION['fullName'] = $fullName;
        $_SESSION['doctor_id'] = $doctor_id;
        $_SESSION['role'] = $role;

        header("location:Doctor/index.php");
    }

    else {
        $sql2 = "select fullName from patients where email='$email' && password='$password'";
        $query2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($query2);
        if ($count2 == 1) {
            $find2 = "select * from patients where email='$email'";
            $retrieve2 = mysqli_query($conn, $find2);
            $patients = mysqli_fetch_all($retrieve2, MYSQLI_ASSOC);

            //the password was correct
            foreach ($patients as $atients) {
                $fullName = $atients['fullName'];
                $patient_id = $atients['patient_id'];
                $role = $atients['role'];
            }
            $_SESSION['fullName'] = $fullName;
            $_SESSION['patient_id'] = $patient_id;
            $_SESSION['role'] = $role;
            header("location:Patient/index.php");
            die();
        }
        else{
            $_SESSION['status'] = "The credentials does not match";
            header("Location:login.php");
            die();
        }
    }
}


?>
