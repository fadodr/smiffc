<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Request Blood</title>
</head>

<body class="donation-page">
    <div class="sand-background" style="background-image: url('images/sand.png')"></div>
    <img class="logo" src="images/logo-white.png" alt="" />
    <div class="form-wrapper">
        <form action="./database/request-blood.php" method="POST">
            <h3>Blood Request Form</h3>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 'noavailablematch') {
                    echo "<p style='color : red'>There is no blood available
                        that matches your blood group and genotype</p>";
                }
            ?>
            <label for="reason">Reason for blood request</label><br />
            <textarea type="text" name="reason"></textarea><br /><br />
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <div class="corner-illustration">
        <img class="illustration" src="images/register-illustration.png" alt=""/>
        <img class="pic" src="images/register-image.png" alt=""/>
    </div>
</body>

</html>