<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Patients</title>
</head>

<body>
  <!-- Dashboard Navigation Start-->
  <div class="dashboard-navigation">
    <div class="dashboard-navigation-background"></div>
    <div class="dashboard-navigation-card">
      <div class="logo-section">
        <img src="images/logo.png" alt="logo" />
      </div>
      <div class="navigation-section">
        <ul>
          <li>
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
          <li class="active-nav-item">
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
        <h3>Patients</h3>
      </div>
    </div>
    <div class="dashboard-section-4">
      <table>
        <thead>
          <tr>
            <th>Patient Name</th>
            <th>Patient ID</th>
            <th>Phone Number</th>
            <th>Blood type</th>
            <th>Genotype</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once("./database/connectDb.php");

          $sql = "SELECT * FROM patients";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                      <td>" . $row['fullname'] . "</td>
                      <td>" . $row['uuid'] . "</td>
                      <td>" . $row['phone'] . "</td>
                      <td>" . $row['blood_group'] . "</td>
                      <td>" . $row['genotype'] . "</td>
                      <td><button onclick= 'toggleModal()'>View</button></td>
                    </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Dashboard End -->

  <!-- Entry details -->
  <div id="detailsModal" class="details-modal">
    <div class="details-header">
      <h3>Patient Info</h3>
      <img src="images/close.png" onclick="toggleModal()" alt=""/>
    </div>
    <div class="details-body">
      <div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Date</p>
            <p class="value">11 November 2022, 14:28:21</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Full Name</p>
            <p class="value">Atanda Damilare</p>
          </div>
          <div class="content-item">
            <p class="detail">Blood Type</p>
            <p class="value blood">O+</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Patient Email</p>
            <p class="value">atandadray@gmail.com</p>
          </div>
          <div class="content-item">
            <p class="detail">Patient Phone Number</p>
            <p class="value">08123456789</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Total donors</p>
            <p class="value">2</p>
          </div>
        </div>
      </div>
    </div>
    <div class="details-body">
      <p>Donor Info-1:</p>
      <div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Date</p>
            <p class="value">11 November 2022, 14:28:21</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor</p>
            <p class="value">Atanda Damilare</p>
          </div>
          <div class="content-item">
            <p class="detail">Blood Type</p>
            <p class="value blood">O+</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor Email</p>
            <p class="value">atandadray@gmail.com</p>
          </div>
          <div class="content-item">
            <p class="detail">Donor Phone Number</p>
            <p class="value">08123456789</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value verified">• Verified</p>
          </div>
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value pending">• Pending</p>
          </div>
        </div>
      </div>
    </div>
    <div class="details-body">
      <p>Donor Info-2:</p>
      <div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Date</p>
            <p class="value">11 November 2022, 14:28:21</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor</p>
            <p class="value">Atanda Damilare</p>
          </div>
          <div class="content-item">
            <p class="detail">Blood Type</p>
            <p class="value blood">O+</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor Email</p>
            <p class="value">atandadray@gmail.com</p>
          </div>
          <div class="content-item">
            <p class="detail">Donor Phone Number</p>
            <p class="value">08123456789</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value verified">• Verified</p>
          </div>
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value pending">• Pending</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Entry details end -->

  <script src="js/script.js"></script>
</body>

</html>