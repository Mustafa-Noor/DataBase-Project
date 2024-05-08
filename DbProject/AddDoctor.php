<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>

    <style>
        /* CSS styles */
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

    nav a:nth-child(7) {
        width: 160px;
    }

        nav a:nth-child(7):hover ~ .animation {
            width: 160px;
            left: 790px;
        }
    

            

        /* Main Content Styles */
        .wrapper {
            margin: 10px auto;
            padding: 0 10%;
            padding-bottom: 100px;
            text-transform: capitalize;
        }

        #AddDoctorHeading {
            margin: 30px;
            color: #fff;
            font-size: 45px;
            text-align: center;
            padding-bottom: 15px;
            text-shadow: 0 15px 10px rgb(0, 0, 0, 0.2);
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            color: #fff;
            font-size: 20px;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            outline: none;
        }

        .btn {
            color: #fff;
            border: none;
            outline: none;
            font-size: 17px;
            padding: 10px 15px;
            background: #333;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
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

        .error {
            color: red;
            font-size: 14px;
            display: none;
        }

    </style>
</head>
<body>
    <nav>
        <a href="#">Add</a>
        <a href="SignInDoctor.php">Doctor</a>
        <a href="SignInPatient.php">Patient</a>
        <a href="AboutUs.html">About</a>
        <a href="Blog.html">Blog</a>
        <a href="ContactUs.html">Contact</a>
        
        <div class="animation start-home"></div>
    </nav>
    <div class="wrapper">

        <h1 id="AddDoctorHeading">Add Doctor</h1>
        <form id="addDoctorForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
            <!-- Add hidden input field to hold the value of isValid variable -->
            <input type="hidden" name="isValidate" value="false">

            <div class="input-group">
                <label for="userName">UserName Name</label>
                <input type="text" id="userName" name="userName" placeholder="Enter user name">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="input-group">
                <label for="doctorName">Doctor Name</label>
                <input type="text" id="doctorName" name="doctorName" placeholder="Enter doctor name">
            </div>
            <div class="input-group">
                <label for="doctorEmail">Doctor Email</label>
                <input type="text" id="doctorEmail" name="doctorEmail" placeholder="Enter doctor email">
            </div>
            <div class="input-group">
                <label for="doctorPhone">Doctor Phone</label>
                <input type="text" id="doctorPhone" name="doctorPhone" placeholder="Enter doctor phone number">
            </div>
            <div class="input-group">
                <label for="doctorSpecialization">Specialization</label>
                <select id="doctorSpecialization" name="doctorSpecialization">
                    <option value="general">General Physician</option>
                    <option value="dentist">Dentist</option>
                    <option value="dermatologist">Dermatologist</option>
                    <option value="pediatrician">Pediatrician</option>
                </select>
            </div>
            <button type="submit" class="btn">Add Doctor</button>
        </form>
        </div>

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
			/*
            function validateForm() {
                var userName = document.getElementById("userName").value;
                var password = document.getElementById("password").value;
                var doctorName = document.getElementById("doctorName").value;
                var doctorEmail = document.getElementById("doctorEmail").value;
                var doctorPhone = document.getElementById("doctorPhone").value;

                var isValid = true;

                if (userName.trim() === "") {
                    alert("Enter userName");
                    isValid = false;
                }
                else if (password.trim() === "") {
                    alert("Enter password");
                    isValid = false;
                }
                // Validation for doctor name
                else if (doctorName.trim() === "") {
                    alert("tere mun ch lol pen yakka doctor name likh.");
                    isValid = false;
                }

                // Validation for doctor email
                else if (doctorEmail.trim() === "") {
                    alert("tere mun ch lol pen yakka email likh.");
                    isValid = false;
                } else if (!doctorEmail.includes("@")) {
                    alert("tere mun ch lol sai email  likh.");
                    isValid = false;
                }

                // Validation for doctor phone
                else if (doctorPhone.trim() === "") {
                    alert("tere mun ch lol pen yakka phone number likh.");
                    isValid = false;
                } else if (doctorPhone.length !== 11 || isNaN(doctorPhone)) {
                    alert("tere mun ch lol pen yakka sai phone likh.");
                    isValid = false;
                }

                if (!isValid) {
                    return false;
                }
                submitForm();
            }*/
            function submitForm() {
        var form = document.getElementById("addDoctorForm");
        form.querySelector('input[name="isValidate"]').value = "false";
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process_form.php", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Handle successful response
                console.log(xhr.responseText);
            } else {
                // Handle error
                console.error(xhr.statusText);
            }
        };
        xhr.onerror = function () {
            // Handle network error
            console.error("Network error");
        };
        xhr.send(formData);
    }
        </script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is valid
    if (isset($_POST["isValidate"]) && $_POST["isValidate"] == "false") {
        // Retrieve form data
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $doctorName = $_POST["doctorName"];
        $doctorEmail = $_POST["doctorEmail"];
        $doctorPhone = $_POST["doctorPhone"];
        $doctorSpecialization = $_POST["doctorSpecialization"];

        // Validate form data
        $errors = [];

        if (empty($userName)) {
            $errors[] = "Username is required.";
        }

        if (empty($password)) {
            $errors[] = "Password is required.";
        }

        if (empty($doctorName)) {
            $errors[] = "Doctor's name is required.";
        }

        if (!filter_var($doctorEmail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (!preg_match("/^[0-9]{11}$/", $doctorPhone)) {
            $errors[] = "Invalid phone number format.";
        }

        if (empty($errors)) {
            // Connect to your database (replace placeholders with your actual database credentials)
            $servername = "localhost";
            $username = "root";
            $db_password = ""; // Provide your MySQL password here
            $dbname = "hospital";

            // Create connection
            $conn = new mysqli($servername, $username, $db_password, $dbname);

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
            // Display validation errors
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        }
    } else {
        echo "Form is not valid";
    }
}
?>

</body>
</html>