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

    <!-- Form and PHP Code Container-->
    <div class="container pt-4 pb-4">

      <!--Doctors Appointments Headline-->
      <div class="row">
        <div class="col">
          <h1 class="h1">Doctors Appointments</h1>
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

//SQL Statement to get the Doctors appointments
$sql = "select Patient.name, R.Appt_Date, R.time "
      . "from Reservations R "
      . "inner join Has on R.resid=Has.resid "
      . "inner join Patient on Patient.hid=Has.hid "
      . "inner join Doctor on Doctor.did=Has.did "
      . "where Doctor.name=?";

//Prepare Statement, Stage 1: Prepare
$stmt = $mysqli->prepare($sql);

//Prepare Statement, Stage 2: Bind to Variable and Execute
$doctor_name = $_POST['doctor_name'];
$stmt->bind_param('s', $doctor_name);
$stmt->execute();

//Bind Result Variables
$stmt->bind_result($patient_name, $appt_date, $appt_time);

//Fetch and Display Values in a Table Format
if($stmt->fetch()){

  printf('<p class="lead">%s has the following appointments:</p>', $doctor_name);

  echo '<table class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col">Patient Name</th>';
  echo '<th scope="col">Date</th>';
  echo '<th scope="col">Time</th>';
  echo '</tr>';
  echo '<thead>';

  //If the Query Returned a Result the first will be displayed in an unordered list
  echo'<tbody>';
  echo'<tr>';
  printf('<td>%s</td>', $patient_name);
  printf('<td>%s</td>', $appt_date);
  printf('<td>%s</td>', $appt_time);
  echo'</tr>';

  //The rest of the results will be displayed in this loop
  while($stmt->fetch()){
    echo'<tr>';
    printf('<td>%s</td>', $patient_name);
    printf('<td>%s</td>', $appt_date);
    printf('<td>%s</td>', $appt_time);
    echo'</tr>';
  }

  echo '</tbody>';
  echo '</table>';

}

//If a doctor has no upcoming appointments
else {
  printf('<p class="lead">%s has no upcoming appointments.</p>', $doctor_name);
}

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
