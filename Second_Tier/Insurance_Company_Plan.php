<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

<title>MedApps</title>
</head>

<body>

  <div class="container bg-dark">
    <div class="row">
      <div class="col-md text-center">
        <h1 class="display-1 text-light p-4">MedApps</h1>
      </div>
    </div>
  </div>

<!--Container to House the Patient Form-->
<div class="container pt-4 pb-4">

  <!--Insurance Details Headline-->
  <div class="row">
    <div class="col">
      <h1 class="h1">Insurance Details</h1>
    </div>
  </div>

  <!--Form Styling-->

      <div class="form-group">

      <form action="../Third_Tier/Insurance_Details_Next.php" method="post">

      <!--PHP Script to Get the MySQLi connection-->
      <?php
      //Enable Error Logging
      error_reporting(E_ALL ^ E_NOTICE);

      //mysqli connection via user-defined function
      include ('../my_connect.php');
      $mysqli = get_mysqli_conn();


       ?>

       <?php
      //SQL Statement
      $sql = "select Patient.name "
            . "FROM Patient";

      //Prepared Statement, stage 1: prepare
      $stmt = $mysqli->prepare($sql);

      //Prepared Statement, stage 2: execute
      $stmt->execute();

      //Bind Result Variables
      $stmt->bind_result($patient_names);

      //Fetch Values and Display in a Dropdown List
      echo '<label for="patient_name">Select Patient: </label>';
      echo '<select class="form-control form-control-lg" name="patient_name">';
      while ($stmt->fetch())
      {
        printf ('<option value="%s">%s</option>', $patient_names, $patient_names);
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
