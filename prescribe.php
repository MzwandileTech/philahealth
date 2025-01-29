<!DOCTYPE html>
<?php
include('func1.php');
$pid = '';
$ID = '';
$appdate = '';
$apptime = '';
$fname = '';
$lname = '';
$doctor = $_SESSION['dname'];
if (isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
    $pid = $_GET['pid'];
    $ID = $_GET['ID'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $appdate = $_GET['appdate'];
    $apptime = $_GET['apptime'];
}

if (isset($_POST['prescribe']) && isset($_POST['pid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])) {
    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
    $disease = $_POST['disease'];
    $allergy = $_POST['allergy'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pid = $_POST['pid'];
    $ID = $_POST['ID'];
    $prescription = $_POST['prescription'];

    $query = mysqli_query($con, "insert into prestb(doctor,pid,ID,fname,lname,appdate,apptime,disease,allergy,prescription) values ('$doctor','$pid','$ID','$fname','$lname','$appdate','$apptime','$disease','$allergy','$prescription')");
    if ($query) {
        echo "<script>alert('Prescribed successfully!');</script>";
    } else {
        echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <style>
      /* Navbar styling */
      .navbar {
        background: linear-gradient(to left, #3931af, #00c6ff);
      }
      .navbar-brand {
        font-weight: bold;
        font-size: 24px;
      }
      .navbar-nav .nav-item .nav-link {
        color: #fff !important;
        font-size: 16px;
        padding: 12px 18px;
      }
      .navbar-nav .nav-item .nav-link:hover {
        background-color: #342ac1;
        border-radius: 5px;
      }
      .navbar-toggler {
        border: none;
      }

      /* General Styling */
      body {
        font-family: 'IBM Plex Sans', sans-serif;
        background-color: #f4f7fc;
        padding-top: 60px;
      }

      .container-fluid {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 900px;
        margin: 0 auto;
      }

      h3 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
      }

      /* Form and Inputs */
      .form-group {
        margin-top: 30px;
        margin-bottom: 20px;
      }
      textarea {
        width: 100%;
        padding: 12px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
      }
      textarea:focus {
        border-color: #3c50c1;
        box-shadow: 0 0 5px rgba(60, 80, 193, 0.5);
        outline: none;
      }

      label {
        font-weight: bold;
        color: #333;
      }

      /* Button Styling */
      button, input[type="submit"] {
        background-color: #3c50c1;
        border: none;
        padding: 12px 20px;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      button:hover, input[type="submit"]:hover {
        background-color: #2b40a3;
      }

      /* Spacing for inputs and labels */
      input[type="text"], textarea {
        margin-bottom: 20px;
      }

      .row {
        margin-bottom: 15px;
      }
      .col-md-4 {
        text-align: right;
        padding-right: 15px;
      }
      .col-md-8 {
        padding-left: 15px;
      }

      /* Button alignment */
      .text-center {
        text-align: center;
      }
    </style>
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Philahealth+ </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctor-panel.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid">
      <h3>Prescribing for Patient: <?php echo $fname . " " . $lname; ?></h3>
      <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
        <div class="row">
          <div class="col-md-4"><label>Diagnosis:</label></div>
          <div class="col-md-8"><textarea id="disease" name="disease" required></textarea></div>
        </div>

        <div class="row">
          <div class="col-md-4"><label>Known Allergies:</label></div>
          <div class="col-md-8"><textarea id="allergy" name="allergy" required></textarea></div>
        </div>

        <div class="row">
          <div class="col-md-4"><label>Prescribed Treatment:</label></div>
          <div class="col-md-8"><textarea id="prescription" name="prescription" required></textarea></div>
        </div>

        <input type="hidden" name="fname" value="<?php echo $fname ?>" />
        <input type="hidden" name="lname" value="<?php echo $lname ?>" />
        <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
        <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
        <input type="hidden" name="pid" value="<?php echo $pid ?>" />
        <input type="hidden" name="ID" value="<?php echo $ID ?>" />

        <div class="text-center">
          <input type="submit" name="prescribe" value="Prescribe" class="btn btn-primary">
        </div>
      </form>
    </div>
  </body>
</html>

