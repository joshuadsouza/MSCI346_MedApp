<!--Header that Includes the Bootstrap CDN-->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

  <title>MedApps</title>

</head>

<body>

  <!--MedApp Header-->
    <div class="container bg-dark">
      <div class="row">
        <div class="col-md text-center">
          <h1 class="display-1 text-light p-4">MedApps</h1>
        </div>
      </div>
    </div>

    <div class="container pt-4 pb-4">

      <!--Doctors Appointments Headline-->
      <div class="row">
        <div class="col">
          <h1 class="h1">Patient Record</h1>
        </div>
      </div>

<!--Bootstrap Form Styling-->
<div class="form-group">

<!--Form to link back to the main menu-->
<form action="../index.php">

<?php
//Enable Error Logging:
error_reporting(E_ALL ^ E_NOTICE);

//MySQLi Connection via User-Defined Function
include('../my_connect.php');
$mysqli = get_mysqli_conn();

//SQL Statement to Insert Patient Record
$sql = "insert into Records(Date, Description) "
      . "values (?, ?)";

//Prepare Statement, Stage 1: Prepare
$stmt = $mysqli->prepare($sql);

//Prepare Statement, Stage 2: Bind Variable and Execute
//Get the Date and Description from Previous Inputs
$date = $_POST['date'];
$description = $_POST['description'];

//Bind Parameters and Execute Statement
$stmt->bind_param("ss", $date, $description);
$stmt->execute();

echo '<p class="lead">You have successfully updated the patients record!</p>';

//Close connection for Insert Patient Record Statement
$stmt->close();

//GET THE "RID" FOR THE RECORD THAT WAS JUST ADDED
$sql = "select Records.RID "
      . "from Records "
      . "where Records.Date=? AND Records.Description=?";

//Prepare Statement, Stage 1: Prepare
$stmt = $mysqli->prepare($sql);

//Bind Parameters and Execute Statement
$stmt->bind_param("ss", $date, $description);
$stmt->execute();

//Get Result
$stmt->bind_result($rid);

//If the result has a return value set the Patient Rid equal to the Rid from the statement, if empty return an error
if($stmt->fetch()){
  $patient_rid = $rid;
}
else{
  echo '<p class="lead">Error</p>';
}

//Close statement
$stmt->close();


 //WITH THE RID AND THE HID FROM THE PREVIOUS FORM, ADD INTO THE Past TABLE
 $sql = "insert into Past(hid, rid) "
       . "values (?, ?)";

 //Prepare Statement, Stage 1: Prepare
 $stmt = $mysqli->prepare($sql);

 //Get Patient HID
 $patient_hid = $_POST['patient_hid'];

 //Bind Parameters and Execute Statement
 $stmt->bind_param("ss", $patient_hid, $patient_rid);
 $stmt->execute();

 //Close connection
 $stmt->close();

 //WITH THE RID AND THE DID FROM THE PREVIOUD FORM, ADD INTO THE Assign TABLE
 $sql = "insert into Assign(did, rid) "
       . "values (?, ?)";

 //Prepare Statement, Stage 1: Prepare
 $stmt = $mysqli->prepare($sql);

 //Get Patient HID
 $doctor_did = $_POST['doctor_did'];

 //Bind Parameters and Execute Statement
 $stmt->bind_param("ss", $doctor_did, $patient_rid);
 $stmt->execute();

 //Close connection
 $stmt->close();
 $mysqli->close();
  ?>

</div>

 <!-- Return to Home Page Button -->
 <input type="submit" value="Home" class="btn btn-dark" />

</form>
</div>
</body>
