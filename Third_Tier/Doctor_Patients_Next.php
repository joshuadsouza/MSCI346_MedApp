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
          <h1 class="h1">Number of Patients</h1>
        </div>
      </div>

<!--Bootstrap for Form Group-->
<div class="form-group">

<!--Form to link back to the main menu-->
<form action="../index.php">

<?php
//Enable Error Logging:
error_reporting(E_ALL ^ E_NOTICE);

//MySQLi Connection via User-Defined Function
include('../my_connect.php');
$mysqli = get_mysqli_conn();

//SQL Statement to get the Insurance Company and Plan for Patient
$sql = "select Doctor.name, count(Has.hid) "
      . "from (Has inner join Doctor on Doctor.did = Has.did) "
      . "group by Doctor.did "
      . "having count(Has.hid) >= ?";

//Prepare Statement, Stage 1: Prepare
$stmt = $mysqli->prepare($sql);

//Prepare Statement, Stage 2: Bind Variable and Execute
$num_patients = $_POST['num_patients'];
$stmt->bind_param('i', $num_patients);
$stmt->execute();

//Bind Result Variables
$stmt->bind_result($doctor_name, $number_patients);

//Fetch and Display Values in a table
if($stmt->fetch()){
  echo '<table class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col">Doctor Name</th>';
  echo '<th scope="col">Number of Patients</th>';
  echo '</tr>';
  echo '<thead>';

  //If the Query Returned a Result the first will be displayed in an unordered list
  echo'<tbody>';
  echo'<tr>';
  printf('<td>%s</td>', $doctor_name);
  printf('<td>%s</td>', $number_patients);
  echo'</tr>';

  //The rest of the results will be displayed in this loop
  while($stmt->fetch()){
    echo'<tr>';
    printf('<td>%s</td>', $doctor_name);
    printf('<td>%s</td>', $number_patients);
    echo'</tr>';
  }
  echo '</tbody>';
  echo '</table>';
}

//If no doctor has above a certain number of patients
else {
  printf('<p class="lead">No doctor has %s or more patients</p>', $num_patients);
}

$stmt->close();
$mysqli->close();

?>

</div>

<!-- Return to Home Page Button -->
<input type="submit" value="Home" class="btn btn-dark"/>
</form>
</div>
</body>
