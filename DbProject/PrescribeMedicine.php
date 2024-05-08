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
    <title>PrescribeMedicine</title>
</head>

<body>
    <nav>
        <a href="DoctorMenu.html">Home</a>
        <a href="AboutUs.html">About</a>
        <a href="Blog.html">Blog</a>
        <a href="AppoinmentMenuDoc.php">Appointments</a>
        <a href="CheckPatient.php">Check Patient</a>
        <a href="ViewAllPatients.php">All Patients</a>
        <a href="UpdateProfile">Check Profile</a>
        <div class="animation start-home"></div>
    </nav>
    <h1 id="DoctorMenuHeading">Prescribe Medicine</h1><br><br>
    <div class="modal">
        <div class="modal__container">
            <div class="modal__featured">
                
                <div class="modal__content">
                    

                    <form method="post">
                    <h2>Write Presciptions Details For The Patient</h2><br><br>
                        <ul class="form-list">
                        <li class="form-list__row">
                            <label>Select Patient ID</label>
                            <select name="IdInput" required="">
                            <option value="">Select Patient ID</option>
                            <?php
          
            $conn = new mysqli("localhost", "root", "", "hospital");

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT Patient.Patient_ID, Patient.Name 
        FROM Patient 
        JOIN Appointment ON Patient.Patient_ID = Appointment.patient_ID
        WHERE Appointment.doctor_ID = (SELECT Doctor_ID 
                                      FROM Doctor 
                                      WHERE username = (SELECT username 
                                                        FROM activeusers 
                                                        WHERE role = 'doctor'))";


            
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
                        </li>
                            <li class="form-list__row">
                                <label>Name Of Medicine</label>
                                <input type="text" name="MedicineInput" required="" />
                            </li>
                            <li class="form-list__row">
                                <label>Write Dosage</label>
                                <input type="text" name="DosageInput" required="" />
                            </li>
                            <li style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="button" style="align-items: center;">Prescribe Medicine</button>
                            </li>
                </div>
            </div>
        </div>
    </div>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['IdInput'], $_POST['MedicineInput'], $_POST['DosageInput'])) {
    
    $conn = new mysqli("localhost", "root", "", "hospital");

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
$stmt = $conn->prepare("INSERT INTO prescription (Patient_ID, Doctor_ID, Date, Medicine, Dosage) VALUES (?, (SELECT Doctor_ID FROM Doctor WHERE username = (SELECT username FROM activeusers WHERE role = 'doctor')), NOW(), ?, ?)");
$stmt->bind_param("iss", $patient_id, $medicine, $dosage);


$patient_id = $_POST['IdInput']; 
$medicine = $_POST['MedicineInput'];
$dosage = $_POST['DosageInput'];


$stmt->execute();


    if ($stmt->affected_rows > 0) {
        echo "<p>Prescription successfully added.</p>";
    } else {
        echo "<p>Error adding prescription.</p>";
    }

   
    $stmt->close();
    $conn->close();
}
?>


   </form>


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
        footer {
    background-color: #f8f8f8;
    color: #333;
    padding: 30px 0;
margin-top: 20px;
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
        .IdInputForm {
            display: flex;
            position: relative;
            justify-content: center;
            height: 100vh;
            /* Adjust this value as needed */
        }

h1,
h2,
h3,
h4,
h5 {
  margin: 0;
  font-weight: 600; 
}

.button {
  color: #ffffff;
  background-color: #333;
  padding: 12px 50px;
  font-size: 12px;
  letter-spacing: 1px;
  text-transform: uppercase;
  border: 0;
  border-radius: 2px;
  outline: 0;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.2);
  -webkit-transition: all .2s;
  transition: all .2s; }
  .button:hover, .button:active, .button:focus {
    -webkit-transform: scale(1.1);
            transform: scale(1.1); }

.button--transparent {
  background: transparent;
  border: 0;
  outline: 0; }


.button--info {
  position: relative;
  top: 0;
  right: 0; }

input {
  width: calc(100% - 10px);
  min-height: 30px;
  padding-left: 5px;
  padding-right: 5px;
  letter-spacing: .5px;
  border: 0;
  border-bottom: 2px solid #f0f0f0; }
  input:valid {
    border-color: #24cf5f; }
  input:focus {
    outline: none;
    border-color: #fbcf34; }

.form-list {
  padding-left: 0;
  list-style: none; }
  .form-list__row {
    margin-bottom: 25px; }
    .form-list__row label {
      position: relative;
      display: block;
      text-transform: uppercase;
      font-weight: 600;
      font-size: 11px;
      letter-spacing: .5px;
      color: #939393; }
    .form-list__row--inline {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-pack: justify;
          -webkit-box-pack: justify;
              justify-content: space-between; }
      .form-list__row--inline > :first-child {
        -ms-flex: 2;
            -webkit-box-flex: 2;
                flex: 2;
        padding-right: 20px; }
      .form-list__row--inline > :nth-child(2n) {
        -ms-flex: 1;
            -webkit-box-flex: 1;
                flex: 1; }
  .form-list__input-inline {
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -ms-flex-pack: justify;
        -webkit-box-pack: justify;
            justify-content: space-between; }
    .form-list__input-inline > * {
      width: calc(50% - 10px - 10px); }
  .form-list__row--agree {
    margin-top: 30px;
    margin-bottom: 30px;
    font-size: 12px; }
    .form-list__row--agree label {
      font-weight: 400;
      text-transform: none;
      color: #676767; }
    .form-list__row--agree input {
      width: auto;
      margin-right: 5px; }

      .modal__container {
    display: flex;
}

.modal__featured {
    flex: 1;
}

.modal__form {
    flex: 1;
}

.modal__product {
    
    height: auto;
}

.modal__content {
    display: flex;
}

.form-list {
    list-style-type: none;
    padding: 0;
}

.form-list__row {
    margin-bottom: 10px;
}

.modal {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-pack: center;
      -webkit-box-pack: center;
          justify-content: center;
  -ms-flex-align: center;
      -webkit-box-align: center;
          align-items: center;
  height: 100vh;
  width: 100vw;
  padding-top: 0px;
  z-index: 100; 
overflow-y: auto;
align-items: flex-start;
}
  .modal__container {
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    max-width: 675px;
    min-height: 400px;
    position: relative;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.1); }
  .modal__featured {
    position: relative;
    -ms-flex: 1;
        -webkit-box-flex: 1;
            flex: 1;
    min-width: 230px;
    padding: 20px;
    overflow: hidden;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px; }
    </style>
</body>

</html>