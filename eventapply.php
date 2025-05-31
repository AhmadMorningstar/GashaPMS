<?php
// Database connection
$conn = new mysqli("sql108.infinityfree.com", "if0_38250336", "Ahm20066", "if0_38250336_PMS");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $country = $_POST['country'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO event_applications (event_id, first_name, last_name, birthdate, gender, location, country, department, email, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $event_id, $first_name, $last_name, $birthdate, $gender, $location, $country, $department, $email, $phone_number);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to confirmation page
        echo "<script>alert('Your application has been submitted successfully!'); window.location.href='invitations.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
