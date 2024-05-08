<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Page</title>
    <!-- Include jQuery and jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #30e3ca;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Prescription</h1>
    <form id="prescriptionForm" method="post" action="">
        <label for="doctorName">Doctor Name:</label>
        <select id="doctorName" name="doctorName" required>
            <option value="">Select Doctor</option>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hospital";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to select all doctor names and IDs from the "doctor" table
            $sql = "SELECT Doctor_ID, Name FROM doctor";
            $result = $conn->query($sql);

            // If there are results, generate the options for the combo box
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row["Doctor_ID"]) . "'>" . htmlspecialchars($row["Name"]) . "</option>";
                }
            }

            // Close the database connection
            $conn->close();
            ?>

        </select>
        <span class="error" id="doctorNameError"></span>

        <label for="medications">Medications:</label>
        <textarea id="medications" name="medications" rows="4" required></textarea>
        <span class="error" id="medicationsError"></span>

        <label for="prescriptionDate">Date:</label>
        <input type="text" id="prescriptionDate" name="prescriptionDate" required>
        <span class="error" id="prescriptionDateError"></span>

        <input type="submit" name="submit" value="Submit Prescription">
    </form>
    <div id="result"></div>
</div>

<script>
    $(document).ready(function(){
    // Function to initialize form submission handling
    function initializeFormSubmission() {
        // Initialize jQuery UI datepicker
        $("#prescriptionDate").datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });

        // Form submission handling
        $("#prescriptionForm").submit(function(event) {
            // Prevent default form submission behavior
            event.preventDefault();

            // Validate form inputs
            var doctorId = $("#doctorName").val();
            var medications = $("#medications").val();
            var prescriptionDate = $("#prescriptionDate").val();

            var valid = true;

            if (doctorId === "") {
                $("#doctorNameError").text("Please select a doctor");
                valid = false;
            }

            if (medications === "") {
                $("#medicationsError").text("Please enter medications");
                valid = false;
            }

            if (prescriptionDate === "") {
                $("#prescriptionDateError").text("Please select a date");
                valid = false;
            }

            // If form inputs are valid, submit the form
            if (valid) {
                // Serialize form data
                var formData = $(this).serialize();
                
                // Submit the form
                $.ajax({
                    type: "POST",
                    url: "", // Empty URL as we're submitting to the same page
                    data: formData,
                    success: function(response) {
                        // Redirect to the same page
                        window.location.href = window.location.href;
                    }
                });
            }
        });
    }

    // Call the function initially
    initializeFormSubmission();
});

</script>


<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the active user's username from the activeusers table where role is patient
    $sql_active_username = "SELECT username FROM activeusers WHERE role = 'patient'";
    $result_active_username = $conn->query($sql_active_username);

    if ($result_active_username->num_rows > 0) {
        // Assuming there's only one active patient user, otherwise you might need to adjust this part
        $row_active_username = $result_active_username->fetch_assoc();
        $active_username = $row_active_username["username"];

        // Get patient ID from the patient table based on the active user's username
        $sql_patient_id = "SELECT Patient_ID FROM patient WHERE username = ?";
        $stmt_patient_id = $conn->prepare($sql_patient_id);
        $stmt_patient_id->bind_param("s", $active_username);
        $stmt_patient_id->execute();
        $stmt_patient_id->bind_result($patient_id);
        $stmt_patient_id->fetch();
        $stmt_patient_id->close();

        // Get the doctor ID from the form submission
        $doctorId = $_POST['doctorName'];

        // Get the date from the date picker
        $prescription_date = $_POST['prescriptionDate'];

        // Get the medication text as purpose
        $medications = $_POST['medications'];

        // Get the current time
        $current_time = date("Y-m-d H:i:s");

        // Insert data into the appointment table
        $sql_insert_appointment = "INSERT INTO appointment(Patient_ID, Doctor_ID, Date, Purpose, Time) 
                                   VALUES (?, ?, ?, ?, ?)";
        $stmt_insert_appointment = $conn->prepare($sql_insert_appointment);
        $stmt_insert_appointment->bind_param("iisss", $patient_id, $doctorId, $prescription_date, $medications, $current_time);
        if ($stmt_insert_appointment->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_insert_appointment . "<br>" . $conn->error;
        }
        $stmt_insert_appointment->close();
    } else {
        echo "No active patient found";
    }

    $conn->close();
}
?>

</body>
</html>
