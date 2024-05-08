<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="DocMenuStyle.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>View Patients</title>
</head>
<body>
<nav>
        <a href="DoctorMenu.html">Home</a>
        <a href="#">About</a>
        <a href="#">Blog</a>
        <a href="AppoinmentMenuDoc.php">Appointments</a>
        <a href="CheckPatient.php">Check Patient</a>
        <a href="PrescribeMedicine.php">Prescibe Medicine</a>
        <a href="UpdateProfile.php">Check Profile</a>
        <div class="animation start-home"></div>
    </nav>
    <div class="content">
        <h1 id="DoctorMenuHeading">View All Patients</h1><br><br>
        <table>
        <tr>
            <th>Patient Id</th>
            <th>Patient Name</th>
            <th>Date Of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone</th>
        </tr>
        <?php
           
                // Establish connection to the database (Replace with your connection details)
                $conn = new mysqli("localhost", "root", "", "hospital");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare SQL query
                $sql = "Select * from patient";

                // Execute query
                $result = $conn->query($sql);

                // Check if there are any rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Patient_ID']."</td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['Date_of_Birth']."</td>";
                    echo "<td>".$row['Gender']."</td>";
                    echo "<td>".$row['Address']."</td>";
                    echo "<td>".$row['Phone_Number']."</td>";
                    echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No Patients found.</td></tr>";
                }

                // Close connection
                $conn->close();
            
            ?>

    </table>
    </div>
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
            var dateInput = document.getElementById("IdInput").value;
            if (!dateInput) {
                alert("Id field cannot be empty!");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>

    <style>
        footer {
    background-color: #f8f8f8;
    color: #333;
    padding: 30px 0;
margin-top: 50px; /* Adjusted top margin */
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
        nav a:nth-child(5){
	width: 160px;
}
nav a:nth-child(5):hover~.animation{
	width: 160px;
	left: 470px;
}
nav a:nth-child(6){
	width: 160px;
}
nav a:nth-child(6):hover~.animation{
	width: 160px;
	left: 630px;
}
nav a:nth-child(7){
	width: 160px;
}
nav a:nth-child(7):hover~.animation{
	width: 160px;
	left: 790px;
}
        table {
            position: relative;
    z-index: 2;
    margin: 20px auto; /* Center the table horizontally and add some margin */
    width: 80%; /* Adjusted width */
    border-collapse: collapse;
    border-spacing: 0;
    box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
    border-radius: 12px 12px 0 0;
    overflow: hidden;
        }

        td,
        th {
            padding: 15px 20px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fafafa;
            font-family: 'Open Sans', Sans-serif;
            font-weight: 200;
            text-transform: uppercase;
        }

        tr {
            width: 100%;
            background-color: #fafafa;
            font-family: 'Montserrat', sans-serif;
        }

        tr:nth-child(even) {
            background-color: #eeeeee;
        }
    </style>
</body>
</html>
