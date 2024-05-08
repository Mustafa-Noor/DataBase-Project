<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #30e3ca;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
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
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        textarea {
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
    <h1>Feedback Form</h1>
    <form id="feedbackForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Feedback Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" name="submit" value="Submit Feedback">
    </form>
</div>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL query to insert data into feedback table
    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Feedback submitted successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
