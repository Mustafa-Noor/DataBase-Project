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
        <a href="#">About</a>
        <a href="#">Blog</a>
        <a href="AppoinmentMenuDoc.php">Appointments</a>
        <a href="CheckPatient.php">Check Patient</a>
        <a href="ViewAllPatients.php">All Patients</a>
        <a href="#">Check Profile</a>
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
                                <label>Enter Patient ID</label>
                                <input type="text" name="IdInput" required="" />
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
    // Check if form is submitted
    if(isset($_POST['IdInput'], $_POST['MedicineInput'], $_POST['DosageInput'])){
        // Establish connection to the database (Replace with your connection details)
        $conn = new mysqli("localhost", "root", "", "hospital");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind parameters for the SQL INSERT query
        $stmt = $conn->prepare("INSERT INTO prescription (Patient_ID, Doctor_ID, Date, Medicine, Dosage) VALUES (?, 1, CURDATE(), ?, ?)");
        $stmt->bind_param("iss", $patientId, $medicine, $dosage);


        // Set parameters and execute the query
        $patientId = $_POST['IdInput'];
        $medicine = $_POST['MedicineInput'];
        $dosage = $_POST['DosageInput'];
        $stmt->execute();

        // Check if prescription is successfully inserted
        if ($stmt->affected_rows > 0) {
            echo "<p>Prescription successfully added.</p>";
        } else {
            echo "<p>Error adding prescription.</p>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>
   </form>


    <footer>
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