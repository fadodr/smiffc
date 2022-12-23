<?php
if (isset($_POST['submit'])) {
    require_once("./connectDb.php");

    $bloodBankId = $_POST['blood_bank_id'];

    $sql = "UPDATE blood_bank SET blood_status = 'approved' WHERE uuid = '" . $bloodBankId . "' ";
    if (!mysqli_query($conn, $sql)) {
        header("location: ../blood-bank.php?error=sqlerror");
        exit();
    };

    header("location : ../blood-bank.php");
    exit();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location : ../blood-bank.php");
    exit();
}
?>