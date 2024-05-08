<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="DocMenuStyle.css">
  <title>Check Update Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background:rgb(48, 198, 185);
    }

    .navbar {
      background-color: #333;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
    }

    .navbar-logo img {
      height: 50px;
    }

    .navbar-links a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
    }

    .main-content {
    display: flex;
    justify-content: space-around; /* Adjusted to space-around */
    margin: 50px auto;
}

.left-panel {
    flex: 1; 
    box-sizing: border-box; /* Include padding and border in width calculation */
    width: 40%;
    border: 1px solid #ccc;
    padding: 20px;
}

.right-panel {
    flex: 1;
    box-sizing: border-box; /* Include padding and border in width calculation */
    width: 40%;
    border: 1px solid #ccc;
    padding: 20px;
}    
    .left-panel h2, .right-panel h2 {
      margin-top: 0;
    }

    .left-panel ul {
      list-style: none;
      padding: 0;
    }

    .left-panel ul li {
      margin-bottom: 10px;
    }

    .right-panel label {
      display: block;
      margin-bottom: 5px;
    }

    .right-panel input[type="text"],
    .right-panel input[type="password"],
    .right-panel input[type="email"],
    .right-panel input[type="tel"] {
      width: 60%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .right-panel button {
      color: #fff;
    border: none;
    outline: none;
    font-size: 17px;
    margin-top: 20px;
    padding: 8px 15px;
    background: #333;
    border-radius: 5px;
    display: inline-block;
    text-decoration: none;
    }

    .right-panel button:hover {
      letter-spacing: 1px;
      transform: scale(1.03);
    box-shadow: 0 10px 15px rgb(0, 0, 0, 0.2);
    }

    .footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 20px 0;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <nav>
        <a href="DoctorMenu.html">Home</a>
        <a href="#">About</a>
        <a href="#">Blog</a>
        <a href="AppoinmentMenuDoc.php">Appointments</a>
        <a href="CheckPatient.php">Check Patient</a>
        <a href="ViewAllPatients.php">All Patients</a>
        <a href="PrescribeMedicine.php">Prescribe Medicine</a>
        <div class="animation start-home"></div>
    </nav>
    <h1 id="DoctorMenuHeading">Update Profile</h1>

  <!-- Main content -->

  <div class="main-content">
    <!-- right panel -->
    <div class="right-panel">
      <h2>Update Information</h2>
      <form method="post" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        <button type="submit">Update</button>
      </form>
    </div>
    <!-- left panel -->
    <div class="left-panel">
      <h2>Current User Information</h2>
      <?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select username from active user where role is doctor
$active_user_query = "SELECT username FROM activeusers WHERE role = 'doctor'";
$active_user_result = $conn->query($active_user_query);
if ($active_user_result->num_rows > 0) {
    $row = $active_user_result->fetch_assoc();
    $username = $row['username'];
    
    // Select all data from the doctor table where username = previously selected username
    $doctor_data_query = "SELECT * FROM doctor WHERE username = '$username'";
    $doctor_data_result = $conn->query($doctor_data_query);
    if ($doctor_data_result->num_rows > 0) {
        $doctor_row = $doctor_data_result->fetch_assoc();
        echo "<div class='left-panel'>";
        echo "<ul>";
        echo "<li><strong>Name:</strong> " . $doctor_row['Name'] . "</li>";
        echo "<li><strong>Phone:</strong> " . $doctor_row['Phone_Number'] . "</li>";
        echo "<li><strong>Email:</strong> " . $doctor_row['Email'] . "</li>";
        echo "</ul>";
        echo "</div>";
    }
}

// Close connection
$conn->close();
?>

    </div>
  </div>
    
  <!-- Footer -->
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
    <style>
      
/* Footer CSS */
footer {
    background-color: #f8f8f8; /* Same background color as before */
    color: #333; /* Same text color as before */
    padding: 30px 0;
    text-align: center;
    margin-top: 50px; /* Added margin to the top */
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
    color: #666; /* Same text color as before */
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
    color: #333; /* Same link color as before */
    text-decoration: none;
}

.footerBottom {
    text-align: center;
    margin-top: 20px;
}
    </style>
</body>
</html>