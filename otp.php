<?php
session_start();
include('connection.php');
include('functions.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code) {
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/Exception.php");
    require("PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sadikrahman397@gmail.com';                     //SMTP username
        $mail->Password   = 'biaj nkst fshp fmzn';                               //SMTP password
        $mail->SMTPSecure = 'ssl';         //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sadikrahman397@gmail.com', 'ElderTech BD');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from ElderTech BD';
        $mail->Body    = "Thanks for the registration please verify your email.<br> 
        <h3>Your verify OTP CODE $v_code</h3>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST["resend_otp"])) {
     
    $_SESSION['v_code'] = rand(100000, 999999); ;
 
    $_SESSION['time'] = time(); 


    sendMail($_SESSION['email'], $_SESSION['v_code']);

    if (isset($_POST["resend_otp"])) {
        echo "OTP resend successfully.";
    } else {
        echo "OTP does not resend successfully.";
    }
}


// OTP verification code
if (isset($_POST["Verify"])) {
    if (isset($_SESSION['v_code']) && isset($_SESSION['email'])) {
        $otp = $_SESSION['v_code'];
        $email = $_SESSION['email'];
        $otp_code = $_POST['Otp_Code'];
        $timestamp = time(); // Get the current timestamp
     

        if (($timestamp - $_SESSION['time']) > 60) {
            echo "<script>alert('OTP expired. Please try again.');</script>";
        } else {
            $query = "SELECT * FROM `registration` WHERE `email`='$email'";
            $result = mysqli_query($con, $query);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $result_fetch = mysqli_fetch_assoc($result);
                    if ($result_fetch['is_verrified'] == 0) {
                        $update = "UPDATE `registration` SET `is_verrified`=1 WHERE `email`='$email'";
                        if (mysqli_query($con, $update)) {
                            echo "
                            <script>
                            alert('Email verification successful');
                            window.location.href='main.php';
                            </script>
                            ";
                        } else {
                            echo "
                            <script>
                            alert('Failed to update verification status');
                            window.location.href='main.php';
                            </script>
                            ";
                        }
                    } else {
                        echo "
                        <script>
                        alert('Email already registered');
                        window.location.href='main.php';
                        </script>
                        ";
                    }
                } else {
                    echo "
                    <script>
                    alert('Email or verification code is incorrect');
                    window.location.href='main.php';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('Cannot run query');
                window.location.href='main.php';
                </script>
                ";
            }
        }
    }
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Otp verification</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="otp.css">
    </head>
    <body>
   <form action=""  method="POST">


    <div class="otp-box">
   <div class="img">
   <img src="https://t.ly/7CuFm"alt ="logo" width= 100px >

   </div>
   <div class="content-box">
    <h2> Verification Code</h2>
    <p> We have sent you a verification code in your registered email address.</p>
   </div>

   <div class="inputs">
   <input type="text" maxlength= "6" name= "Otp_Code">

   </div>
   <div class="verify-btn">
   <button type="submit" name="Verify">Verify</button>  
 
   <p id="countdown"></p>
   <button type ="submit" name= "resend_otp" id= "resendLink">Resend OTP</button>


   </div>

    </div>
        
   </form>
        
        <script src="script.js" async defer></script>

<script>

document.addEventListener('DOMContentLoaded', function () {
            let countdownElement = document.getElementById('countdown');
            let verifyButton = document.getElementById('verifyButton');
            let resendLink = document.getElementById('resendLink');
            let timeLeft = 40; // Countdown time in seconds

            function updateCountdown() {
                if (timeLeft > 0) {
                    countdownElement.textContent = `Time left: ${timeLeft} seconds`;
                    timeLeft--;
                } else {
                    verifyButton.disabled = true;
                    countdownElement.style.display = 'none';
                    resendLink.style.display = 'block';
                }
            }

            // Start countdown
            let countdownInterval = setInterval(updateCountdown, 1000);

            resendLink.addEventListener('click', function () {
                // Regenerate OTP and reset timer
                timeLeft = 40;
                verifyButton.disabled = false;
                countdownElement.style.display = 'block';
                resendLink.style.display = 'none';

                // AJAX request to regenerate OTP
                // let xhr = new XMLHttpRequest();
                // xhr.open('POST', '', true); // Current PHP file
                // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                // xhr.onreadystatechange = function () {
                //     if (xhr.readyState == 4 && xhr.status == 200) {
                //         console.log('OTP resent successfully.');
                //     }
                // };
                // xhr.send('resend_otp=true');

                // Restart countdown
                clearInterval(countdownInterval);
                countdownInterval = setInterval(updateCountdown, 1000);
            });
        });



</script>
    </body>
</html>