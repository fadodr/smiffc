<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Login</title>
  </head>
  <body class="register-page">
    <div class="register-left">
      <img class="sand-background" src="images/sand.png" alt=""/>
      <img class="logo" src="images/logo-white.png" alt=""/>
      <img
        class="register-illustration"
        src="images/register-illustration.png"
        alt=""
      />
      <img class="register-image" src="images/register-image.png" alt=""/>
    </div>
    <div class="register-right">
      <form action="./database/login-patient.php" method="POST">
        <h3>Login As A Patient</h3>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == 'emptyfields') {
            echo "<p style='color : red'>Fill in all Fields</p>";
          }
        } elseif ($_GET['register'] == 'incorrectdetails') {
          echo "<p style='color : red'>Invalid details</p>";
        }
        ?>
        <label for="patient_id">Patient ID</label><br />
        <input
          type="text"
          name="patient_id"
          placeholder="Enter ID here"
        /><br /><br />
        <label for="phone">Phone number</label><br />
        <input type="tel" name="phone" placeholder="Enter phone number here" />
        <button type="submit" name="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
