<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Donation Form</title>
  </head>
  <body class="donation-page">
    <div
      class="sand-background"
      style="background-image: url('images/sand.png')"
    ></div>
    <img class="logo" src="images/logo-white.png" />
    <div class="form-wrapper">
      <form>
        <h3>Donation Form</h3>
        <label for="donor_name">Donor Name</label><br />
        <input
          type="text"
          name="donor_name"
          placeholder="Enter Donor Name here"
        /><br /><br />
        <label for="phone">Phone number</label><br />
        <input
          type="tel"
          name="phone"
          placeholder="Enter phone number here"
        /><br /><br />
        <label for="email">Email address</label><br />
        <input
          type="email"
          name="email"
          placeholder="Enter email address here"
        /><br /><br />
        <label for="blood_group">Blood group</label><br />
        <select name="blood_group">
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option></select
        ><br /><br />
        <label for="genotype">Genotype</label><br />
        <select name="genotype">
          <option value="AA">AA</option>
          <option value="AS">AS</option>
          <option value="AC">AC</option>
          <option value="SC">SC</option>
          <option value="SS">SS</option>
        </select>
        <button type="submit">Submit</button>
      </form>
    </div>
    <div class="corner-illustration">
      <img class="illustration" src="images/register-illustration.png" />
      <img class="pic" src="images/register-image.png" />
    </div>
  </body>
</html>
