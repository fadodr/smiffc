<?php
    session_start();
    if (isset($_POST['submit'])) {
        require_once("./connectDb.php");

        $patientId = $_POST['patient_id'];
        $phone = $_POST['phone'];

        if (empty($patientId) || empty($phone)) {
            header("location: ../login.php?error=emptyfields");
            exit();
        }

        $sql = "SELECT * FROM patients
            WHERE uuid='" . $patientId . "' AND '" . $phone . "' ";
        $result = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($records == 0) {
            header("location: ../login.php?error=incorrectdetails");
            exit();
        } else {
            $_SESSION['patient_id'] = $row['uuid'];
            $_SESSION['patient_name'] = $row['fullname'];
            $_SESSION['patient_blood_group'] = $row['blood_group'];
            $_SESSION['patient_genotype'] = $row['genotype'];
            header("Location: /smiffb/user-dashboard.php");
            exit();
        }
        mysqli_close($conn);
    } else {
        header("location: ../login.php");
        exit();
    }
?>