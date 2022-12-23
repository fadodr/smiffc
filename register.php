<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Register</title>
</head>

<body class="register-page">
  <div class="register-left">
    <img class="sand-background" src="images/sand.png" />
    <img class="logo" src="images/logo-white.png" />
    <img class="register-illustration" src="images/register-illustration.png" />
    <img class="register-image" src="images/register-image.png" />
  </div>
  <div class="register-right">
    <form action="./database/add-patient.php" method="POST">
      <h3>Register A Patient</h3>
      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyfields') {
          echo "<p style='color : red'>Fill in all Fields</p>";
        } elseif ($_GET['error'] == 'emailexist') {
          echo "<p style='color : red'>Email address already exist</p>";
        }
      } elseif ($_GET['register'] == 'success') {
        echo "<p style='color : green'>You have successfully added a new patient</p>";
      }
      ?>
      <label for="fullname">Full Name</label><br />
      <input type="text" name="fullname" placeholder="Enter full name here" /><br /><br />
      <label for="phone">Phone number</label><br />
      <input type="tel" name="phone" placeholder="Enter phone number here" /><br /><br />
      <label for="email">Email address</label><br />
      <input type="email" name="email" placeholder="Enter email address here" /><br /><br />
      <label for="blood_group">Blood group</label><br />
      <select name="blood_group">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
      </select><br /><br />
      <label for="genotype">Genotype</label><br />
      <select name="genotype">
        <option value="AA">AA</option>
        <option value="AS">AS</option>
        <option value="AC">AC</option>
        <option value="SC">SC</option>
        <option value="SS">SS</option>
      </select>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>