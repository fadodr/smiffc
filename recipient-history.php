<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Recipient History</title>
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
          <li class="active-nav-item">
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
        <h3>Recipient History</h3>
      </div>
    </div>
    <div class="dashboard-section-4">
      <table>
        <thead>
          <tr>
            <th>Donor</th>
            <th>Donor phone number</th>
            <th>Recipient</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once('./database/connectDb.php');

          $sql = "SELECT * FROM recipient_history
            INNER JOIN blood_bank on recipient_history.donor_id = blood_bank.uuid
            INNER JOIN patients on recipient_history.recipient_id = patients.uuid";

          $result = mysqli_query($conn, $sql);
          $records = mysqli_num_rows($result);
          while ($row = mysqli_fetch_object($result)) {
            $data = json_encode($row);
            echo "<tr>
                    <td>" . $row->donor_fullname . "</td>
                    <td>" .  $row->donor_phone . "</td>
                    <td>" . $row->fullname . "</td>
                    <td>" . $row->date_received . "</td>";
            echo
            '<td><button
              onclick="openRecipientModal(\''.$row->date_donated .'\',
              \''.$row->donor_fullname.'\', \''.$row->donor_blood_group.'\',
              \'' . $row->donor_email . '\', \'' . $row->donor_phone . '\',
              \'' . $row->blood_status . '\', \'' . $row->fullname . '\',\'' . $row->reason . '\')"
              >View</button></td>';
            echo "</tr>";
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
      <h3>Blood Donation</h3>
      <img src="images/close.png" onclick="closeModal()" alt="" />
    </div>
    <div id="bloodDonorInfo" class="details-body">
    </div>
    <div id="bloodPatientInfo" class="details-body">
    </div>
  </div>
  <!-- Entry details end -->

  <script src="js/script.js"></script>
</body>

</html>
