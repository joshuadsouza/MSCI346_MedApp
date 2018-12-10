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

<div class="form-group">

<!-- Using a Form get the Number of Patients -->
<form action="../Third_Tier/Doctor_Patients_Next.php" method="post">

<!-- Label for Number of Patients Text Input -->
<label for="num_patients">Number of Patients: </label>

<!-- Store Value in num_patients -->
<input type="text" name = "num_patients" class="form-control form-control-lg" />
</div>

<input type="submit" class="btn btn-dark" />

</form>
</div>
</body>
