<html>

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

<!-- Container containing the MedApps Header of Site-->
<div class="container bg-dark">
  <div class="row">
    <div class="col-md text-center">
      <h1 class="display-1 text-light p-4">MedApps</h1>
    </div>
  </div>
</div>


<!--Bootstrap Container Class-->
<div class="container pt-4 pb-4">

  <!--Row Containing Queries -->
  <div class="row">

    <!--Row Split up into two "6" Columns -->
    <div class="col-sm-6">

      <!--Get the insurance company and policy for a patient-->
      <div class="card text-center">
        <div class="card-body">
          <form action="./Second_Tier/Insurance_Company_Plan.php">
            <h5 class="card-title">Patient Insurance</h5>
            <p class="card-text lead">Get the insurance company and policy of a patient.</p>
            <input type="submit" value="Continue" class="btn btn-dark"/>
          </form>
        </div>
      </div>

    </div>
    <div class="col-sm-6">

      <!--Get the Number of Patients a Doctor Has-->
      <div class="card text-center">
        <div class="card-body">
          <form action="./Second_Tier/Doctors_Patients.php">
            <h5 class="card-title">Number of Patients</h5>
            <p class="card-text lead">This will get you the number of patients a doctor has.</p>
            <input type="submit" value="Continue" class="btn btn-dark" />
          </form>
        </div>
      </div>
    </div>
  </div>

    <!--Second Row for Second set of Queries -->
    <div class="row pt-4">
      <div class="col-sm-6">
        <div class="card text-center">
          <div class="card-body">

            <!--Form to get the lowest price medicine -->
            <form action="./Second_Tier/Medicine_Lowest_Price.php">
              <h5 class="card-title">Lowest Priced Medicine</h5>
              <p class="card-text lead">This will get you the lowest price medicine that treats a condition.</p>
              <input type="submit" value="Continue" class="btn btn-dark"/>
            </form>

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card text-center">
          <div class="card-body">

            <!--Form to get the doctors upcoming appointments-->
            <form action="./Second_Tier/Doctors_Appointments.php">
              <h5 class="card-title">Upcoming Appointments</h5>
              <p class="card-text lead">Select a doctor and get the date and time for their upcoming patient appointments.</p>
              <input type="submit" value="Continue" class="btn btn-dark"/>
            </form>
          </div>
        </div>
      </div>
    </div>

<!--Additional Row for last Query (insert)-->
    <div class="row pt-4">
      <div class="col">
        <div class="card text-center">
          <div class="card-body">
            <!--Form to insert a patient record -->
            <form action="./Second_Tier/Insert_Patient_Record.php">
              <h5 class="card-title">Add Record</h5>
              <p class="card-text lead">Add the date and description for patient record-keeping after every appointment.</p>
              <input type="submit" value="Continue" class="btn btn-dark"/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
