<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Error page">
    <title>Application Submitted</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header -->
    <?php include("./components/header.inc") ?>

    <section class="success-page">
        <div class="container">
            <?php
            ob_start();
            session_start();

            // Prevent user from accessing this page directly without an error occurring
            if (is_null($_SESSION["exit_msg"])) {
                header("Location: index.php");
                exit();
            }


            foreach ($_SESSION["exit_msg"] as $msg) {
                echo $msg;
            }

            echo "<p>Click <a href=\"" . $_SESSION["origin"] . "\" class=\"link-style horizontal-wipe\">here</a> to go back to the Home page.</p>";
            ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include("./components/footer.inc") ?>
</body>

</html>

<?php
require_once("util.php");
reset_session_with_exception();
ob_end_flush();
?>