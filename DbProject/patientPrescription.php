<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/favicon.png">
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
		nav {
            position: relative;
            margin: 0;
            padding: 0;
            width: 590px auto;
            height: 50px;
            background: #333;
            border-radius: 8px;
            font-size: 0;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
        }

            nav a {
                font-size: 15px;
                text-transform: uppercase;
                color: white;
                text-decoration: none;
                line-height: 50px;
                position: relative;
                z-index: 1;
                display: inline-block;
                text-align: center;
            }

            nav .animation {
                position: absolute;
                height: 100%;
                top: 0;
                z-index: 0;
                background: rgb(48, 198, 185);
                border-radius: 8px;
                transition: all .5s ease 0s;
            }

            nav a:nth-child(1) {
                width: 100px;
            }

            nav .start-home,
            a:nth-child(1):hover ~ .animation {
                width: 100px;
                left: 0px;
            }

            nav a:nth-child(2) {
                width: 110px;
            }

                nav a:nth-child(2):hover ~ .animation {
                    width: 110px;
                    left: 100px;
                }

            nav a:nth-child(3) {
                width: 100px;
            }

                nav a:nth-child(3):hover ~ .animation {
                    width: 100px;
                    left: 210px;
                }

            nav a:nth-child(4) {
                width: 160px;
            }

                nav a:nth-child(4):hover ~ .animation {
                    width: 160px;
                    left: 310px;
                }

            nav a:nth-child(5) {
                width: 160px;
            }

                nav a:nth-child(5):hover ~ .animation {
                    width: 160px;
                    left: 470px;
                }

            nav a:nth-child(6) {
                width: 160px;
            }

                nav a:nth-child(6):hover ~ .animation {
                    width: 160px;
                    left: 630px;
                }

            


        .wrapper {
            margin: 10px auto;
            padding: 0 10%;
            padding-bottom: 10px;
            text-transform: capitalize;
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
		footer {
            background-color: #f8f8f8;
            color: #333;
            padding: 30px 0;
        }

        .footerContainer {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footerLogo img {
            max-width: 150px;
        }

        .footerLinksContainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .footerLinks {
            flex: 1;
            margin-right: 20px;
        }

            .footerLinks h4 {
                color: #666;
                font-size: 16px;
                margin-bottom: 10px;
            }

            .footerLinks ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

                .footerLinks ul li {
                    margin-bottom: 8px;
                }

                    .footerLinks ul li a {
                        color: #333;
                        text-decoration: none;
                    }

        .footerBottom {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav>
<a href="Patient.html">Home</a>
        <a href="ContactUs.html">Contact</a>
        <a href="AboutUs.html">About</a>
        <a href="Blog.html">Blog</a>
		<div class="animation start-home"></div>
		</nav>

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
<footer>
        <div class="footerContainer">
            <div class="footerLogo">
                <img src="Images/Alhaaj logo.png" alt="Microsoft Logo">
            </div>
            <div class="footerLinksContainer">
                <div class="footerLinks">
                    <h4>Faculty</h4>
                    <ul>
                        <li><a href="#">Doctors</a></li>
                        <li><a href="#">Nurse</a></li>
                        <li><a href="#">Surgeon</a></li>
                        <li><a href="#">Lab operators</a></li>
                        <li><a href="#">servants</a></li>
                    </ul>
                </div>
                <div class="footerLinks">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Medical Care</a></li>
                        <li><a href="#">Emergency Care</a></li>
                        <li><a href="#">Laboratory Services</a></li>
                        <li><a href="#">Pharmacy services</a></li>
                        <li><a href="#">Surgical Services</a></li>
                    </ul>
                </div>
                <div class="footerLinks">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Contact HealthHub</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy </a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Trademarks</a></li>
                    </ul>
                </div>
                <div class="footerLinks">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="#">About HealthHub</a></li>
                        <li><a href="#">Company news</a></li>
                        <li><a href="#">Facilities at HealthHub</a></li>
                        <li><a href="#">Investors</a></li>
                        <li><a href="#">Diversity and inclusion</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footerBottom">
            <p>&copy; 2024 HealthHub. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
