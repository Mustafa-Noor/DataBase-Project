<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css" />
    <style>
		      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
      *{
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
        max-width: 600px;
        width: 100%;
        height: 800px; /* Increased height to accommodate new inputs */
        background: rgba(255, 255, 255);
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      }
      .container header {
  font-size: 2rem; /* Increased font size for better visibility */
  color: #333;
  font-weight: bold; /* Making the header bold */
  text-align: center;
  margin-bottom: 20px; /* Increased margin to separate header from form */
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
        color: #333;
      }
      .form :where(.input-box input, .select-box) {
        position: relative;
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        margin-top: 8px;
        border: 1px solid #332424;
        border-radius: 6px;
        padding: 0 15px;
        background: rgba(255, 255, 255, 0.4);
      }
      .input-box input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
      }
      .form .column {
        display: flex;
        column-gap: 15px;
      }
      .form .gender-box {
        margin-top: 20px;
      }
      .gender-box h3 {
        color: #333;
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 8px;
      }
      .form :where(.gender-option, .gender) {
        display: flex;
        align-items: center;
        column-gap: 50px;
        flex-wrap: wrap;
      }
      .form .gender {
        column-gap: 5px;
      }
      .gender input {
        accent-color: rgb(106, 181, 251);
      }
      .form :where(.gender input, .gender label) {
        cursor: pointer;
      }
      .gender label {
        color: #707070;
      }
      .address :where(input, .select-box) {
        margin-top: 15px;
        background: rgba(255, 255, 255, 0.4);
      }
      .select-box select {
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        color: #707070;
        font-size: 1rem;
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
      .select-box select:hover {
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        color: black;
        font-size: 1rem;
      }
      /*Responsive*/
      @media screen and (max-width: 500px) {
        .form .column {
          flex-wrap: wrap;
        }
        .form :where(.gender-option, .gender) {
          row-gap: 15px;
        }
      }
	
      /* CSS styles */
      .error-message {
          margin-top: 30px;
          color: red;
      }
    </style>
</head>
<body>
    <section class="container">
        <header>Registration Page</header>
        <form action="#" method="post" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Enter your Full Name" required />
            </div>
            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your Username" required />
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your Password" required />
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter your Address" required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="Enter your Phone Number" required />
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" required />
                </div>
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="Male" checked />
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="Female" />
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            // Perform PHP validation and database insertion here
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];

            // Perform any additional validation here

            // Insert data into the patient table
            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "hospital";

            // Create connection
            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO patient (Name, Date_of_Birth, Gender, Address, Phone_Number, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $fullname, $dob, $gender, $address, $phone, $username, $password);

            // Execute the statement
            if ($stmt->execute() === TRUE) {
                echo '<div class="error-message">New record created successfully</div>';
            } else {
                echo '<div class="error-message">Error: ' . $stmt->error . '</div>';
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </section>
</body>
</html>
