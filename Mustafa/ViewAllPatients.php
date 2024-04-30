<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="DocMenuStyle.css">
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
        <a href="#">Check Profile</a>
        <div class="animation start-home"></div>
    </nav>
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
    <footer style="margin-top: 130px; position: relative;" >
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li>Email: info@example.com</li>
                </ul>
            </div>

        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; Designed by <span class="designer">Mustafa</span></p>
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
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
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