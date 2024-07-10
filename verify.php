<?php
require("connection.php");

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $v_code = mysqli_real_escape_string($con, $_GET['v_code']);
    
    $query = "SELECT * FROM `registration` WHERE `email`='$email' AND `verification_code`='$v_code'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['is_verified'] == 0) {
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
?>
