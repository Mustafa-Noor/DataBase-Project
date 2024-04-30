<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is valid
    if (isset($_POST["isValidate"]) && $_POST["isValidate"] == "true") {
        // Retrieve form data
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $doctorName = $_POST["doctorName"];
        $doctorEmail = $_POST["doctorEmail"];
        $doctorPhone = $_POST["doctorPhone"];
        $doctorSpecialization = $_POST["doctorSpecialization"];

        // Connect to your database (replace placeholders with your actual database credentials)
        $servername = "localhost";
        $username = "root";
        $password = ""; // Provide your MySQL password here
        $dbname = "hospital";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL statement to insert data into the database
        $stmt = $conn->prepare("INSERT INTO doctor (Email, name, password, phone_number, specialization, username) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Bind parameters
        $stmt->bind_param("ssssss", $doctorEmail, $doctorName, $password, $doctorPhone, $doctorSpecialization, $userName);

        // Execute statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();
    } else {
        echo "Form is not valid";
    }
}
?>
