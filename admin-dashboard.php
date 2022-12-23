<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Dashboard</title>
</head>

<body>
  <?php require_once('./database/connectDb.php'); ?>
  <!-- Dashboard Navigation Start-->
  <div class="dashboard-navigation">
    <div class="dashboard-navigation-background"></div>
    <div class="dashboard-navigation-card">
      <div class="logo-section">
        <img src="images/logo.png" alt="logo" />
      </div>
      <div class="navigation-section">
        <ul>
          <li class="active-nav-item">
            <a href="admin-dashboard.php">
              <img src="images/dashboard-logo.png" />
              <img src="images/dashboard-red-logo.png" />
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="recipient-history.php">
              <img src="images/recipient-history-logo.png" />
              <img src="images/recipient-history-red-logo.png" />
              <span>Recipient History</span>
            </a>
          </li>
          <li>
            <a href="blood-bank.php">
              <img src="images/blood-bank-logo.png" />
              <img src="images/blood-bank-red-logo.png" />
              <span>Blood Bank</span>
            </a>
          </li>
          <li>
            <a href="patients.php">
              <img src="images/patients-logo.png" />
              <img src="images/patients-red-logo.png" />
              <span>Patients</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Dashboard Navigation End -->

  <!-- Dashboard Start -->
  <div class="dashboard">
    <div class="dashboard-section-1">
      <div class="dashboard-section-1-left">
        <h3>Dashboard</h3>
        <p>Welcome 👋, Nice to have you back!</p>
      </div>
      <div class="dashboard-section-1-right">
        <a href="donation-form.php">
          <button class="btn-dark">
            <img src="images/blood-bank-white-logo.png" />
            <p>Add new donor</p>
          </button>
        </a>
        <a href="register.php">
          <button class="btn-light">
            <img src="images/patients-red-logo.png" />
            <p>Add new patient</p>
          </button>
        </a>
      </div>
    </div>
    <div class="dashboard-section-2">
      <div class="grid-child grid-child-1 grid-child-dark">
        <p>Total blood donated</p>
        <h3>
          <?php
          $sql = "SELECT * FROM blood_bank";
          $result = mysqli_query($conn, $sql);
          $records = mysqli_num_rows($result);
          echo $records
          ?>
        </h3>
        <p><b>+ 33.5%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
      <!-- <div class="grid-child grid-child-2 grid-child-light">
        <p>Volume of blood available (In paints)</p>
        <h3>1234</h3>
        <p><b>- 20%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
      <div class="grid-child grid-child-3 grid-child-light">
        <p>Total Donors</p>
        <h3>1234</h3>
        <p><b>+ 20%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div> -->
      <div class="grid-child grid-child-2 grid-child-light">
        <p>Total Patients</p>
        <h3>
          <?php
          $sql = "SELECT * FROM patients";
          $result = mysqli_query($conn, $sql);
          $records = mysqli_num_rows($result);
          echo $records
          ?>
        </h3>
        <p><b>- 8.67%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
    </div>
    <div class="dashboard-section-3">
      <div class="analytics-header">
        <h4>Donation Analytics</h4>
        <div class="analytics-indicator">
          <p>Donors</p>
          <p>Patients</p>
        </div>
        <div class="time-range">
          <p>Monthly</p>
          <p>Weekly</p>
          <p>Today</p>
        </div>
      </div>
      <canvas id="donationAnalytics"></canvas>
    </div>
    <div class="dashboard-section-4">
      <div class="donation-history-header">
        <h4>Recipient History</h4>
        <a href="recipient-history.php">see all</a>
      </div>
      <table>
        <thead>
          <tr>
            <th>Donor</th>
            <th>Donor phone number</th>
            <th>Recipient</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM recipient_history
            INNER JOIN blood_bank on recipient_history.donor_id = blood_bank.uuid
            INNER JOIN patients on recipient_history.recipient_id = patients.uuid LIMIT 5";

          $result = mysqli_query($conn, $sql);
          $records = mysqli_num_rows($result);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['donor_fullname'] . "</td>
                    <td>" . $row['donor_phone'] . "</td>
                    <td>" . $row['fullname'] . "</td>
                    <td>" . $row['date_received'] . "</td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Dashboard End -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/script.js"></script>
</body>

</html>