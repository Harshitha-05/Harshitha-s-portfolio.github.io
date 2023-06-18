<script src="vendor/sweetalert/sweetalert.js"></script>
<?php
if(!empty($_POST)) {
    $fullname = $_POST["name"];
    $email = $_POST["email"];
    $sub = $_POST["subject"];
    $user_message = $_POST["message"];

    
    $conn = new mysqli('127.0.0.1:3307', "root", "", "portfolio", 3307);
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input values to prevent SQL injection attacks
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $email = mysqli_real_escape_string($conn, $email);
    $sub = mysqli_real_escape_string($conn, $sub);
    $user_message = mysqli_real_escape_string($conn, $user_message);

    // form has been submitted, insert data into database
    $stmt = $conn->prepare("INSERT INTO portfolio_dbms(name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $sub, $user_message);

    if($stmt)
    {
        ?>
        <script type="text/javascript">
        setTimeout(function () { swal("Thank You!","Will contact you soon....!","success",{button : false},);
        }, 1000);
        </script>
        <?php
    }
    $stmt->close();
    $conn->close();
}
else
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set('log_errors', 1);
    ini_set('error_log', '/vendor/php-email-form/erroe.log');
    echo "wedfc";
}
?>