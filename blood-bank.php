<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Blood Bank</title>
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
          <li class="active-nav-item">
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
        <h3>Blood Bank</h3>
      </div>
    </div>
    <!---<div class="dashboard-section-2">
      <div class="grid-child grid-child-1 grid-child-light">
        <p>Volume of blood collected (In paints)</p>
        <h3>123,456.78</h3>
        <p><b>+ 33.5%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
      <div class="grid-child grid-child-2 grid-child-light">
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
      </div>
      <div class="grid-child grid-child-4 grid-child-light">
        <p>Total Patients</p>
        <h3>5678</h3>
        <p><b>- 8.67%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
      <div class="grid-child grid-child-5 grid-child-light">
        <p>Total Patients</p>
        <h3>5678</h3>
        <p><b>- 8.67%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
      <div class="grid-child grid-child-6 grid-child-light">
        <p>Total Patients</p>
        <h3>5678</h3>
        <p><b>- 8.67%</b> in the last month</p>
        <div class="canv canv1"></div>
        <div class="canv canv2"></div>
      </div>
    </div>-->
    <div class="dashboard-section-4">
      <?php
      require_once("./database/connectDb.php");

      $sql = "SELECT * FROM blood_bank";
      $result = mysqli_query($conn, $sql);
      $records = mysqli_num_rows($result);
      if ($records == 0) {
        echo "<p>No donors available yet</p>";
      } else {
        echo "<table>
        <thead>
          <tr>
            <th>Donor</th>
            <th>Blood Type</th>
            <th>Genotype</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>";
        while ($row = mysqli_fetch_object($result)) {
          echo '<tr>
                  <td>' . $row->donor_fullname . '</td>
                  <td>' . $row->donor_blood_group . '</td>
                  <td>' . $row->donor_genotype . '</td>
                  <td>' . $row->blood_status . '</td>
                  <td>' . $row->date_donated . '</td>';
          echo '<td><button onclick="openBloodModal(\'' . $row->uuid . '\',\''.$row->date_donated.'\',
            \'' . $row->donor_fullname . '\', \'' . $row->donor_blood_group . '\',
            \'' . $row->donor_email . '\', \'' . $row->donor_phone . '\',
            \'' . $row->blood_status . '\')">View</button></td>';
          echo '</tr>';
        }
        echo "<tbody>
              </tbody>
            </table>";
      }
      ?>
    </div>
  </div>
  <!-- Dashboard End -->

  <!-- Entry details -->
  <div id="detailsModal" class="details-modal">
    <div class="details-header">
      <h3>Blood Info</h3>
      <img src="images/close.png" onclick="closeModal()" />
    </div>
    <div id="bloodInfo" class="details-body">
    </div>
  </div>
  <!-- Entry details end -->

  <script src="js/script.js"></script>

</body>

</html>