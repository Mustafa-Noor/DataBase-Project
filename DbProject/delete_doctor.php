<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if doctor_id is provided via POST request
if(isset($_POST['doctor_id'])) {
    // Sanitize the input to prevent SQL injection
    $doctorId = $conn->real_escape_string($_POST['doctor_id']);

    // SQL query to delete the doctor
    $sql = "DELETE FROM doctor WHERE Doctor_ID = $doctorId";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor deleted successfully";
    } else {
        echo "Error deleting doctor: " . $conn->error;
    }
}

$conn->close();
?>
