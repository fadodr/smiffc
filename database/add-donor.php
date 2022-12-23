<?php
    if (isset($_POST['submit'])) {
        require_once("./connectDb.php");

        $donor_fullname = $_POST['donor_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bloodGroup = $_POST['blood_group'];
        $genotype = $_POST['genotype'];

        if (empty($donor_fullname) || empty($email)
            || empty($phone) || empty($bloodGroup) || empty($genotype)) {
            header("location: ../donation-form.php?error=emptyfields");
            exit();
        }

        $sql = "INSERT INTO blood_bank (donor_fullname, donor_email, donor_phone, donor_blood_group, donor_genotype)
            VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../donation-form.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "sssss",
                $donor_fullname,
                $email,
                $phone,
                $bloodGroup,
                $genotype
            );
            mysqli_stmt_execute($stmt);

            header("location: ../donation-form.php?register=success");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("location: ../donation-form.php");
        exit();
    }
?>