<?php
$servername = "sql108.infinityfree.com";
$username = "if0_38250336"; // Change if needed
$password = "Ahm20066"; // Change if needed
$dbname = "if0_38250336_PMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$message = $_POST['message'];
$user_id = 1; // Change this to get actual logged-in user ID

// Insert into database
$sql = "INSERT INTO messages (user_id, first_name, last_name, email, phone, location, message)
        VALUES ('$user_id', '$first_name', '$last_name', '$email', '$phone', '$location', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Message sent successfully!');
            window.location.href = document.referrer;
          </script>";
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href = document.referrer;
          </script>";
}


$conn->close();
?>
