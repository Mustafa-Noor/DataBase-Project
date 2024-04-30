<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="DocMenuStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Display Appointments</title>
    <style>
    #DoctorMenuHeading {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 20px;
        color: #333;
        font-size: 36px;
    }

    /* Adjustments for responsiveness */
    @media screen and (max-width: 768px) {
        #DoctorMenuHeading {
            font-size: 28px;
        }
    }

    @media screen and (max-width: 480px) {
        #DoctorMenuHeading {
            font-size: 24px;
        }
    }

    /* Additional CSS for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px; /* Added margin to the bottom */
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    /* Footer CSS */
    footer {
        background-color: #f8f8f8;
        color: #333;
        padding: 30px 0;
        text-align: center;
        margin-top: 20px; /* Added margin to the top */
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
        <a href="DoctorMenu.html">Home</a>
        <a href="#">About</a>
        <a href="#">Blog</a>
        <a href="CheckPatient.php">Check Patient</a>
        <a href="PrescribeMedicine.php">Prescibe Medicine</a>
        <a href="ViewAllPatients.php">All Patients</a>
        <a href="#">Check Profile</a>
        <div class="animation start-home"></div>
    </nav>
    <h1 id="DoctorMenuHeading">Display Appointments</h1><br><br>
    <div class="DateInputForm">
        <form method="post" onsubmit="return validateForm()">
            <label for="dateInput" style="font-size: larger;">Select Date: </label>
            <input type="date" id="dateInput" name="dateInput" style="font-size: larger;">
            <button type="submit" id="validateButton" name="submit" class="btn">Choose</button>
        </form>
    </div>

    <table>
        <tr>
            <th>Appointment Id</th>
            <th>Patient Name</th>
            <th>Time</th>
            <th>Purpose</th>
        </tr>
        <?php
            // Check if form is submitted
            if(isset($_POST['submit'])){
                // Establish connection to the database (Replace with your connection details)
                $conn = new mysqli("localhost", "root", "", "hospital");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Get date input
                $date = $_POST['dateInput'];

                // Prepare SQL query
                $sql = "SELECT Appointment.Appt_ID, Patient.Name, Appointment.Time, Appointment.Purpose 
                        FROM Appointment 
                        JOIN Patient ON Appointment.Patient_ID = Patient.Patient_ID 
                        WHERE Appointment.Date = '$date'";

                // Execute query
                $result = $conn->query($sql);

                // Check if there are any rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['Appt_ID']."</td>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['Time']."</td>";
                        echo "<td>".$row['Purpose']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No appointments found for the selected date.</td></tr>";
                }

                // Close connection
                $conn->close();
            }
        ?>
    </table>

    <footer>
        <div class="footerContainer">
            <div class="footerLogo">
                <img src="microsoft_logo.png" alt="Microsoft Logo">
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

    <script>
        function validateForm() {
            var dateInput = document.getElementById("dateInput").value;
            if (!dateInput) {
                alert("Date field cannot be empty!");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</body>
</html>
