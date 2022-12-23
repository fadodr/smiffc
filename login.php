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
      <img class="sand-background" src="images/sand.png" />
      <img class="logo" src="images/logo-white.png" />
      <img
        class="register-illustration"
        src="images/register-illustration.png"
      />
      <img class="register-image" src="images/register-image.png" />
    </div>
    <div class="register-right">
      <form action="./php/login.php" method="POST">
        <h3>Login As A Patient</h3>
        <label for="patient_id">Patient ID</label><br />
        <input
          type="text"
          name="patient_id"
          placeholder="Enter ID here"
        /><br /><br />
        <label for="phone">Phone number</label><br />
        <input type="tel" name="phone" placeholder="Enter phone number here" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
