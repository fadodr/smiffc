<?php
    if (isset($_POST['submit'])) {
        require_once("./connectDb.php");

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bloodGroup = $_POST['blood_group'];
        $genotype = $_POST['genotype'];

        if (empty($fullname) || empty($email)
            || empty($phone) || empty($bloodGroup) || empty($genotype)) {
            header("location: ../register.php?error=emptyfields");
            exit();
        }

        $sql = "SELECT * FROM patients
            WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($result);

        if ($records > 0) {
            header("location: ../register.php?error=emailexist");
            exit();
        }

        $sql = "INSERT INTO patients (fullname, email, phone, blood_group, genotype)
            VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "sssss",
                $fullname,
                $email,
                $phone,
                $bloodGroup,
                $genotype
            );
            mysqli_stmt_execute($stmt);

            header("location: ../register.php?register=success");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("location: ../register.php");
        exit();
    }

?>