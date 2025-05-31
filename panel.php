<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: https://gashainstitute.great-site.net/index.php");
    exit();
}

// Handle logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: https://gashainstitute.great-site.net/index.php");
    exit();
}
?>

<?php
$servername = "sql108.infinityfree.com";
$dbUsername = "if0_38250336"; // Change if needed
$dbPassword = "Ahm20066";     // Change if needed
$dbname = "if0_38250336_PMS";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle new user creation
if (isset($_POST['create_user'])) {
    $new_username = trim($_POST['username']);
    $new_password = trim($_POST['password']);

    // Ensure fields are not empty
    if (!empty($new_username) && !empty($new_password)) {
        // Hash the password using SHA256
        $hashed_password = hash('sha256', $new_password);

        // Prepare statement to insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $new_username, $hashed_password);

        if ($stmt->execute()) {
            echo '<script>alert("User created successfully!"); window.location.href=window.location.href;</script>';
            exit();
        } else {
            $error = "Error creating user: " . $conn->error;
        }
        $stmt->close();
    } else {
        $error = "Please fill in both fields.";
    }
}

// Retrieve all users from the database
$users = [];
$sql = "SELECT username, password FROM users ORDER BY username ASC";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Panel</title>
    <link rel="stylesheet" href="panel.css"> <!-- Link to your CSS file -->
    <style>
            /* Card style */
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
    }
    .card h2 {
      color: #3d52a0;
      border-bottom: 2px solid #3d52a0;
      padding-bottom: 5px;
    }
    /* Form styles */
    .card form div {
      margin-bottom: 15px;
    }
    .card label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #3d52a0;
    }
    .card input {
      padding: 10px;
      width: 100%;
      border: 1px solid #8697c4;
      border-radius: 5px;
    }
    .card button {
      padding: 10px 20px;
      background-color: #3d52a0;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .card button:hover {
      background-color: #7091e6;
    }
    /* List styles */
    .user-item {
      border-bottom: 1px solid #adbbda;
      padding: 10px 0;
    }
    .user-item:last-child {
      border-bottom: none;
    }
    .error {
      color: red;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<!-- Navigation Bar -->
<header>
    <div class="nav-container">
        <nav>
            <ul>
                <li><a href="#" style="color: #adbbda;">Dashboard</a></li>
                <li><a href="https://gashainstitute.great-site.net/createjob.php">Create Job</a></li>
                <li><a href="https://gashainstitute.great-site.net/createevent.php">Create Event</a></li>
                <li><a href="https://gashainstitute.great-site.net/viewapps.php">View Applications</a></li>
                <li><a href="https://gashainstitute.great-site.net/Messages.php">View Messages</a></li>
                <li><a href="?logout=true">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Panel Content -->
<main>
    <div class="card">
        <h2>Welcome, <?= $_SESSION['username'] ?>!</h2>
        <p>You are logged in as <?= $_SESSION['username'] ?>.</p>
    </div>
</main>

<div class="container">
  <!-- Left: Create New User -->
  <div class="left">
    <div class="card">
      <h2>Create New User</h2>
      <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error); ?></p>
      <?php endif; ?>
      <form method="POST" action="">
        <div>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" name="create_user">Create User</button>
      </form>
    </div>
  </div>
  
  <!-- Right: List of Users -->
  <div class="right">
    <div class="card">
      <h2>Existing Users</h2>
      <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
          <div class="user-item">
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
            <p><strong>Password (hashed):</strong> <?= htmlspecialchars($user['password']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No users found.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

</body>
</html>
