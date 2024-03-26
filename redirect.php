<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    body{
        height: 100vh;
        width: 100vw;
        background:deepskyblue;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .doctor_patient{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        width: 30rem;
        height:20rem;
        border-radius: 7%;
        background-color: #fff;
    }
    /* Style the select element */
    select {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /* Style the select element when focused */
    select:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    /* Style the button element */
    button {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /* Style the button when hovered */
    button:hover {
        color: #212529;
        text-decoration: none;
    }

    /* Style the button when focused */
    button:focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Style the button with the .btn class */
    .btn {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Style the button with the .btn class when hovered */
    .btn:hover {
        color: #fff;
        background-color: #0056b3;
        border-color: #0056b3;
    }

</style>
     <div class="doctor_patient">
        <div class="doctor">
            <h3>Register as?</h3>

          <button id="button" class="btn"  onclick=" window.location.href = 'doctor_sign_up.php'">Doctor</button>
          <button id="button" class="btn" onclick="window.location.href = 'patient_sign_up.php'">Patient</button>
        </div>
     
 </div>

<script>


</script>

</body>
</html>