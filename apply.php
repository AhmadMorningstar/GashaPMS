<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

<?php
// Database connection
$servername = "sql108.infinityfree.com";
$username = "if0_38250336";
$password = "Ahm20066";
$dbname = "if0_38250336_PMS";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and get form values
    $job_id = $_POST['job_id'];
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $average_grade = (int)$_POST['average_grade'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    // Generate a unique user_id (could be based on other conditions or session if necessary)
    $user_id = uniqid();

    // Prepare and execute the insert query
    $sql = "INSERT INTO apply (job_id, user_id, first_name, last_name, age, gender, location, country, department, average_grade, email, phone_number)
            VALUES ('$job_id', '$user_id', '$first_name', '$last_name', '$age', '$gender', '$location', '$country', '$department', '$average_grade', '$email', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo '<div style="color: green; font-weight: bold; font-size: 18px;">Application submitted successfully!</div>';
    echo '<script>
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000); // 3 seconds delay
    </script>';

} else {
    echo '<div style="color: red; font-weight: bold;">Error: ' . $sql . '<br>' . $conn->error . '</div>';
}
}

$conn->close();
?>
