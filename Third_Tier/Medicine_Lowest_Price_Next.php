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
          <h1 class="h1">Lowest Priced Medicine</h1>
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

//SQL Statement to get the Lowest Price Medicine
$sql = "select Medicine.medid, Medicine.price "
      . "from Medicine "
      . "where Medicine.price in "
      . "(select min(Medicine.price) "
      . "from Medicine "
      . "where Medicine.treats=?)";

//Prepare Statement, Stage 1: Prepare
$stmt = $mysqli->prepare($sql);

//Prepare Statement, Stage 2: Bind to Variable and Execute
$condition = $_POST['condition'];
$stmt->bind_param('s', $condition);
$stmt->execute();

//Bind Result Variables
$stmt->bind_result($medid, $price);

//Fetch Values
if ($stmt->fetch())
{
    printf('<p class="lead">Medicine ID:%s is the cheapest medicine to treat %s at a price of $%s.</p>', $medid, $condition, $price);
}

else{
  echo '<p class="lead">Error, please report.</p>';
}
//Close connection
$stmt->close();
$mysqli->close();

 ?>

</div>

<!--Form Button-->
<input type="submit" value="Home" class="btn btn-dark"/>
</form>
</div>
</body>
