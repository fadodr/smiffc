<?php
    if (isset($_POST['submit'])) {
        session_start();
        require_once("./connectDb.php");

        $reason = $_POST['reason'];
        $patientBloodGroup = $_SESSION['patient_blood_group'];
        $patientGenotype = $_SESSION['patient_genotype'];

        $sql = "SELECT * FROM blood_bank
        WHERE donor_blood_group = '.$patientBloodGroup'
        AND donor_genotype = '.$patientGenotype.' AND blood_status = 'approved' LIMIT 1";

        $result = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($result);

        if ($records == 0) {
            header("location: ../request-blood.php?error=noavailablematch");
            exit();
        }
        $row = mysqli_fetch_assoc($result);

        $sql = "INSERT INTO recipient_history (donor_id, recipient_id, reason)
            VALUES (?, ? , ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../request-blood.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "sssss",
                $row['donor_id'],
                $_SESSION['patient_id'],
                $reason
            );
            mysqli_stmt_execute($stmt);

            header("location: ../user-dashboard.php?message=requestsuccess");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>
