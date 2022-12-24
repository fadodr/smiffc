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
    <?php
        session_start();
        if (!isset($_SESSION['patient_id'])) {
            header('location: ./login.php');
            exit();
        }
        require_once('./database/connectDb.php');
    ?>

    <!-- Dashboard Start -->
    <div class="user-dashboard">
        <div class="dashboard-section-1">
            <div class="dashboard-section-1-left">
                <h3>Dashboard</h3>
                <p>Welcome, <?php echo $_SESSION['patient_name'] ?> 👋</p>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'requestsuccess') {
                    echo "<p style='color : green'>Your request for blood is successful</p>";
                }
                ?>
            </div>
            <div class="dashboard-section-1-right">
                <a href="request-blood.php">
                    <button class="btn-dark">
                        <img src="images/blood-bank-white-logo.png" alt="" />
                        <p>Request For Blood</p>
                    </button>
                </a>
            </div>
        </div>
        <div class="dashboard-section-2">
            <div class="grid-child grid-child-1 grid-child-dark">
                <p>Total blood you have collected</p>
                <h3>
                    <?php
                        $sql = "SELECT * FROM recipient_history
                        WHERE recipient_id = '" . $_SESSION['patient_id'] . "' ";
                        $result = mysqli_query($conn, $sql);
                        $records = mysqli_num_rows($result);
                        echo $records
                    ?>
                </h3>
                <?php
                    $sql = "SELECT * FROM recipient_history
                    WHERE date_received>now() - interval 1 month
                    AND recipient_id = '" . $_SESSION['patient_id'] . "' ";

                    $result = mysqli_query($conn, $sql);
                    $last_mon_records = mysqli_num_rows($result);
                    $percent_inc = (($records - $last_mon_records) / $records) * 100;
                    echo "<p><b>+ $percent_inc%</b> in the last month</p>"
                ?>
                <div class="canv canv1"></div>
                <div class="canv canv2"></div>
            </div>
        </div>
        <div class="dashboard-section-4">
            <div class="donation-history-header">
                <h4>Blood Received History</h4>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Donor</th>
                        <th>Donor Phone Number
                        <th>Donor Email</th>
                        <th>Date Receieved</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $patientId = $_SESSION['patient_id'];
                    $sql = "SELECT * FROM recipient_history
                    INNER JOIN blood_bank on recipient_history.donor_id = blood_bank.uuid
                    WHERE recipient_id = '" . $_SESSION['patient_id'] . "' ";

                    $result = mysqli_query($conn, $sql);
                    $records = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>" . $row['donor_fullname'] . "</td>
                            <td>" . $row['donor_phone'] . "</td>
                            <td>" . $row['donor_email'] . "</td>
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