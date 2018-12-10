<html>
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
          <h1 class="h1">Insert Patient Record</h1>
        </div>
      </div>

<div class="form-group">

  <form action="../Third_Tier/Insert_Patient_Record_Next.php" method="post">

    <!--ADD TO SELECT A PATIENT-->

    <!--PHP Script to Get the MySQLi connection-->
    <?php
    //Enable Error Logging
    error_reporting(E_ALL ^ E_NOTICE);

    //mysqli connection via user-defined function
    include ('../my_connect.php');
    $mysqli = get_mysqli_conn();


     ?>

     <?php
    //SQL Statement for the doctor to select themselves
    $sql = "select Doctor.did, Doctor.name "
          . "FROM Doctor";

    //Prepared Statement, stage 1: prepare
    $stmt = $mysqli->prepare($sql);

    //Prepared Statement, stage 2: execute
    $stmt->execute();

    //Bind Result Variables
    $stmt->bind_result($doctor_did, $doctor_names);

    //Fetch Values and Display in a Dropdown List
    echo '<label for="doctor_did">Select Doctor: </label>';
    echo '<select class="form-control form-control-lg" name="doctor_did">';
    while ($stmt->fetch())
    {
      printf ('<option value="%s">%s</option>', $doctor_did, $doctor_names);
    }
    echo '</select>';

    //Close statement and connection

    $stmt->close();

    //SQL Statement for the doctor to select the patient they want to add the record for
    $sql = "select Patient.hid, Patient.name "
          . "FROM Patient";

    //Prepared Statement, stage 1: prepare
    $stmt = $mysqli->prepare($sql);

    //Prepared Statement, stage 2: execute
    $stmt->execute();

    //Bind Result Variables
    $stmt->bind_result($patient_hid, $patient_names);

    //Fetch Values and Display in a Dropdown List
    echo '<label for="patient_hid">Select Patient: </label>';
    echo '<select class="form-control form-control-lg" name="patient_hid">';
    while ($stmt->fetch())
    {
      printf ('<option value="%s">%s</option>', $patient_hid, $patient_names);
    }
    echo '</select>';

    //Close statement and connection
    $stmt->close();
    $mysqli->close();

      ?>

    <!--End of Select Patient-->

    <!--Get the Date Input-->
    <label for="date">Date: </label>
    <input type="text" name="date" class="form-control form-control-lg" /><br>


    <!--Get the Description for the Record Input-->
    <label for="description">Description: </label>
    <input type="text" name="description" class="form-control form-control-lg" /><br>

  </div>

    <!--Pass Date and Description Values to the Handler-->
    <input type="submit" value="Add Record" class="btn btn-dark" />

  </form>

</div>
</body>
</html>
