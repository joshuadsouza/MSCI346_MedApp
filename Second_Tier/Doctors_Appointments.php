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
      <h1 class="h1">Doctors Appointments</h1>
    </div>
  </div>

  <!--Form Styling-->

  <div class="form-group">
<form action="../Third_Tier/Doctors_Appointments_Next.php" method="post" />

<?php
//Enable Error Logging
error_reporting(E_ALL ^ E_NOTICE);

//mysqli connection via user-defined function
include ('../my_connect.php');
$mysqli = get_mysqli_conn();

//SQL Statement
$sql = "select Doctor.name "
      . "FROM Doctor";

//Prepared Statement, stage 1: prepare
$stmt = $mysqli->prepare($sql);

//Prepared Statement, stage 2: execute
$stmt->execute();

//Bind Result Variables
$stmt->bind_result($doctor_names);

//Fetch Values and Display in a Dropdown List
echo '<label for="doctor_name">Select Doctor: </label>';
echo '<select name="doctor_name" class="form-control form-control-lg">';
while ($stmt->fetch())
{
  printf ('<option value="%s">%s</option>', $doctor_names, $doctor_names);
}
echo '</select>';

//Close statement and connection
$stmt->close();
$mysqli->close();
 ?>
</div>
<input type="submit" value="Continue" class="btn btn-dark" />
</form>
</div>
</body>
