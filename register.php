<?php

require('connection.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code){

    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/Exception.php");
    require ("PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
      
    
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sadikrahman397@gmail.com';                     //SMTP username
        $mail->Password   = 'biaj nkst fshp fmzn';                               //SMTP password
        $mail->SMTPSecure = 'ssl' ;         //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('sadikrahman397@gmail.com', 'ElderTech BD');
        $mail->addAddress($_POST['email']);    
    
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


if(isset($_POST['register'])){
   $user_exist_query= "SELECT * FROM registration WHERE user_name='$_POST[user_name]' OR email='$_POST[email]'";

   $result=mysqli_query($con,$user_exist_query);

   if($result){

    if(mysqli_num_rows($result)>0){

        $result_fetch= mysqli_fetch_assoc($result);

        if($result_fetch['email']==$_POST['email']){

            echo "<script> 
              alert('This Email is already registered!')
              window.location.href= 'main.php';
              </script> ";
        } else {
        
            echo "<script> 

            window.location.href= 'main.php';
            </script> ";
        }

    } else {

        
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./uploads/" . $filename;
     
        $sql = "INSERT INTO image (filename) VALUES ('$filename')";

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    
        
     
        $v_code= rand(100000,999999);
        $_SESSION['v_code']= $v_code;
   
        $query="INSERT INTO registration (user_name, email, password, image, verification_code, is_verrified) VALUES ('$_POST[user_name]','$_POST[email]','$_POST[password]','$filename','$v_code','0')";
       if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code)){

        $_SESSION['email']= $_POST['email']; 
    
        $_SESSION['time'] =   $_SERVER["REQUEST_TIME"];

            echo "

            <script> alert('Please verify your otp ');
            window.location.href='otp.php';
            </script>";        

       } else {

            echo "<script> alert('Server Down');
            window.location.href='main.php';
            </script>";
       }
    }

   } else {
        echo "<script> alert('Cannot Run Query');
        window.location.href= 'main.php';
        </script> ";
   }
}


?>





<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Registration Form </title>


         <link rel="stylesheet" href="cssstyle.css">
                 
      
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
                        
    </head>


    <body>
        <section class="container forms">
              <div class="form signup">
                <div class="form-content">
                    <header>Registration </header>
                    <form action="" method="POST"enctype="multipart/form-data">
                        <div class="field input-field">
                            <input type="text" placeholder="User Name" class="input" name="user_name">
                        </div>

                        <div class="field input-field">
                            <input type="email" placeholder="email" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="password" class="password"name= "password">
                      
                        </div>
                        <div class="field input-field">
                            <input type="file" placeholder="Insert Your image" accept=".jpg, .jpeg, .png" class="input" name= "image" id="image">
                     
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="register">Register Now</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Sign up with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="google.png" alt="" class="google-img">
                        <span>Sign up with Google</span>
                    </a>
                </div>

              </div>
              
            </section>
     

     
    </body>
</html>