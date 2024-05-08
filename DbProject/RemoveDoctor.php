<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <title>View Doctors</title>
    <style>
            * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    transition: .2s linear;
    font-family: 'Poppins', sans-serif;
}

body {
    background: rgb(48, 198, 185);
}

/* Header Styles */

.btn-delete {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s, color 0.3s;
}

.btn-delete:hover {
    background-color: #0056b3;
    border-color: #0056b3;
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

    

/* Main Content Styles */
.wrapper {
            margin: 10px auto;
            padding: 0 10%;
            padding-bottom: 100px;
            text-transform: capitalize;
        }

#AdminMenuHeading {
    margin: 30px;
    color: #fff;
    font-size: 45px;
    text-align: center;
    padding-bottom: 15px;
    text-shadow: 0 15px 10px rgb(0, 0, 0, 0.2);
}

.container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 32px;
        }

.box {
            height: 250px;
            padding: 20px;
            width: 300px;
            text-align: center;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
			line-height : 30px;
        }
		
		.box:hover {
            transform: translateY(-5px);
        }
    .box img {
        height: 150px;
        width: 300px;
    }

    .box h3 {
            margin-bottom: 10px;
            color: #333;
            font-size: 20px;
        }

     .box p {
            margin-bottom: 8px;
            color: green;
            font-size: 18 px;
			font-weight:bold;
        }

.btn {
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

    .btn:hover {
        letter-spacing: 1px;
        transform: scale(1.03);
        box-shadow: 0 10px 15px rgb(0, 0, 0, 0.2);
    }

/* Footer Styles */
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
    <!-- Header -->
     <nav>
        <a href="#">Delete</a>
        <a href="SignInDoctor.php">Doctor</a>
        <a href="SignInPatient.php">Patient</a>
        <a href="AboutUs.html">About US</a>
        <a href="ContactUs.html">Contact Us</a>
		
        
        <div class="animation start-home"></div>
    </nav>

    <!-- Main Content -->
    <div class="wrapper">
        <h1 id="AdminMenuHeading">Delete Doctors</h1>
        <div class="container">
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

            // SQL query to retrieve doctor information
            $sql = "SELECT Doctor_ID, Name, Phone_Number, Email FROM doctor";
            $result = $conn->query($sql);

            // Check if there are any results
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='box'>";
                    echo "<h3>" . $row["Name"] . "</h3>";
                    echo "<p>ID: " . $row["Doctor_ID"] . "</p>";
                    echo "<p>Phone: " . $row["Phone_Number"] . "</p>";
                    echo "<p>Email: " . $row["Email"] . "</p>";
                    echo "<button onclick='deleteDoctor(" . $row["Doctor_ID"] . ")' class='btn-delete'>Delete Doctor</button>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
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
                <li><a href="#">About HealthHu</a></li>
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
        // JavaScript function to delete a doctor
        function deleteDoctor(doctorId) {
            if (confirm("Are you sure you want to delete this doctor?")) {
                // Send an AJAX request to delete the doctor
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_doctor.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Refresh the page after deletion
                        window.location.reload();
                    }
                }
                xhr.send("doctor_id=" + doctorId);
            }
        }
    </script>
</body>
</html>
