<?php
session_start();

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Server-side validation
    if (empty($username)) {
        $errors[] = "Please enter a username.";
    }

    if (empty($password)) {
        $errors[] = "Please enter a password.";
    }

    // If there are no validation errors, proceed with authentication
    if (empty($errors)) {
        // Connect to your database
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "hospital";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare a statement to check if the username and password match in the doctor table
        $stmt = $conn->prepare("SELECT * FROM doctor WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Username and password match
            // Update the activeUsers table with the username (assuming the role is 'doctor')
            $stmt = $conn->prepare("UPDATE activeUsers SET username = ? WHERE role = 'doctor'");
            $stmt->bind_param("s", $username);
            $stmt->execute();

            // Redirect to a success page or do something else
            header("Location: DoctorMenu.html");
            exit();
        } else {
            // Username and/or password do not match
            $errors[] = "Invalid username or password.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Patient Sign Form</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        /* Your CSS styles */
		/* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: rgb(48, 198, 185);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
.container {
  position: relative;
  max-width: 650px;
  width: 100%;
  height: 400px;
  background: rgba(255, 255, 255); 
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 2rem; 
  color: #333;
  font-weight: bold; 
  text-align: center;
  margin-bottom: 20px;
  text-transform: uppercase; /* Uppercase text for a bold look */
  letter-spacing: 2px; /* Adding letter spacing for emphasis */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Adding a subtle text shadow */
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  display: block; /* Display label as block for proper alignment */
  margin-bottom: 5px; /* Add some space below the label */
  color: #333;
}
.form .input-box input[type="text"],
.form .input-box input[type="password"] {
  width: 100%;
  height: 50px;
  outline: none;
  font-size: 1rem;
  color: #707070;
  border: 1px solid #332424;
  border-radius: 6px;
  padding: 0 15px;
  background: rgba(255, 255, 255, 0.4);
}
.form .input-box input[type="text"]:focus,
.form .input-box input[type="password"]:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form button {
  height: 55px;
    width: 100%;
    color: black;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 35px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    background: rgba(2, 117, 117, 0.6);
}
.form button:hover {
  color: white;
  background: rgb(56, 153, 250);
  transform: translateY(10px);
}
		
		
		
		
        body {
            position: relative;
            min-height: 100vh;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .error-box {
            margin-top: 30px;
            color: red;
        }
    </style>
</head>
<body>
<section class="container">
    <header>Sign In</header>
    <form action="#" method="post" class="form">
        <div class="input-box">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required />
        </div>

        <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required />
        </div>

        <button type="submit">Submit</button>
    </form>

    <?php
    // Display validation errors, if any
    if (!empty($errors)) {
        echo '<div class="error-box">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
    ?>
</section>
</body>
</html>
