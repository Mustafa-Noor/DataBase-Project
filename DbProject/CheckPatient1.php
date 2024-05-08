
<?php
$selectedPatientId = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['IdInput']) && !empty($_POST['IdInput'])) {
        $selectedPatientId = intval($_POST['IdInput']);
        
    } else {
        echo "ID field cannot be empty!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="DocMenuStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Check Prescription</title>
    <style>

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

        #DoctorMenuHeading {
            text-align: center;
            margin-top: 20px; /* Adjusted top margin */
            margin-bottom: 10px;
            color: #333;
            font-size: 36px;
        }
        .IdInputForm {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
            height: 4 vh;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
            box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #fafafa;
            font-family: 'Open Sans', sans-serif;
            font-weight: 200;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Footer Styles */
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


    </style>
</head>
<body>
    <nav>
        <a href="DoctorMenu.html">Home</a>
        <a href="AboutUs.html">About</a>
        <a href="Blog.html">Blog</a>
        <a href="AppoinmentMenuDoc.php">Appointments</a>
        <a href="PrescribeMedicine.php">Prescribe Medicine</a>
        <a href="ViewAllPatientsDoctor.php">View Patients</a>
        <a href="UpdateProfile">Check Profile</a>
        <div class="animation start-home"></div>
    </nav>
    <h1 id="DoctorMenuHeading">Check Patient Prescription</h1><br>
    <div class="IdInputForm">
    <form method="post">
        <label for="IdInput">Select Patient ID</label>
        <select id="IdInput" name="IdInput" style="font-size: larger;" required>
            <?php
            $conn = new mysqli("localhost", "root", "", "hospital");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Patient_ID, Name FROM Patient";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Patient_ID"] . "'>Patient ID " . $row["Patient_ID"] . " - " . $row["Name"] . "</option>";
                }
            } else {
                echo "<option value=''>No patients found</option>";
            }

            $conn->close();
            ?>
        </select>
        <button type="submit" name="submit" class="btn">Choose</button>
    </form>
</div>

    <table>
        <tr>
            <th>Prescription Id</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Medicine</th>
            <th>Dosage</th>
        </tr>
        <?php
        if(isset($_POST['submit'])){
            
             
        
            $conn = new mysqli("localhost", "root", "", "hospital");
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "SELECT Prescription_ID, patient.Name AS Patient_Name, doctor.Name AS Doctor_Name, Date, Medicine, Dosage 
                    FROM prescription 
                    JOIN patient ON prescription.Patient_ID = patient.Patient_ID 
                    JOIN doctor ON prescription.Doctor_ID = doctor.Doctor_ID 
                    WHERE prescription.Patient_ID = '$selectedPatientId'";
        
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Prescription_ID']."</td>";
                    echo "<td>".$row['Patient_Name']."</td>";
                    echo "<td>".$row['Doctor_Name']."</td>";
                    echo "<td>".$row['Date']."</td>";
                    echo "<td>".$row['Medicine']."</td>";
                    echo "<td>".$row['Dosage']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No Presciptions found for the selected Patient.</td></tr>";
            }
        
            // Close connection
            $conn->close();
        }
        
        
        
        ?>
    </table>
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

    <script>
        function validateForm() {
            var idInput = document.getElementById("IdInput").value;
            if (!idInput) {
                alert("ID field cannot be empty!");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</body>
</html>
