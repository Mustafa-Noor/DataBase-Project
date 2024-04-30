<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Check Prescription</title>
    <style>
@import url('https://fonts.googleapis.com/css?family=Poppins');

body{
font-family: 'Poppins', sans-serif;
    background:rgb(48, 198, 185);
}
.wrapper
{
    margin: 10px auto;
    padding: 0 10%;
    padding-bottom: 100px;
    text-transform: capitalize;
    
}

	.btn
{
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
.btn:hover
{
    letter-spacing: 1px;
}
.btn:hover{
    transform: scale(1.03);
    box-shadow: 0 10px 15px rgb(0, 0, 0, 0.2);
}
nav{
	position: relative;
    margin: 0;
    padding: 0;
	width: 590px auto;
	height: 50px;
	background:#333;
	border-radius: 8px;
	font-size: 0;
	box-shadow: 0 2px 3px 0 rgba(0,0,0,.1);
}
nav a{
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
nav .animation{
	position: absolute;
	height: 100%;
	/* height: 5px; */
	top: 0;
	/* bottom: 0; */
	z-index: 0;
	background: rgb(48, 198, 185);
	border-radius: 8px;
	transition: all .5s ease 0s;
}
nav a:nth-child(1){
	width: 100px;
}
nav .start-home, a:nth-child(1):hover~.animation{
	width: 100px;
	left: 0px;
}
nav a:nth-child(2){
	width: 110px;
}
nav a:nth-child(2):hover~.animation{
	width: 110px;
	left: 100px;
}
nav a:nth-child(3){
	width: 100px;
}
nav a:nth-child(3):hover~.animation{
	width: 100px;
	left: 210px;
}
nav a:nth-child(4){
	width: 160px;
}
nav a:nth-child(4):hover~.animation{
	width: 160px;
	left: 310px;
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
margin-top: 20px; /* Adjusted top margin */
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
        <a href="AppoinmentMenuDoc.php">Appointments</a>
        <a href="PrescribeMedicine.php">Prescribe Medicine</a>
        <a href="ViewAllPatients.php">View Patients</a>
        <a href="#">Check Profile</a>
        <div class="animation start-home"></div>
    </nav>
    <h1 id="DoctorMenuHeading">Check Patient Prescription</h1><br>
    <div class="IdInputForm">
        <form method="post" onsubmit="return validateForm()">
            <label for="IdInput" style="font-size: larger;">Enter Patient ID: </label>
            <input type="combo-box" > Select Patirnt ID</input>
            <input type="text" id="IdInput" name="IdInput" style="font-size: larger;">
            <button type="submit" id="validateButton" name="submit" class="btn">Choose</button>
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
            // PHP code for fetching prescription data...
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
