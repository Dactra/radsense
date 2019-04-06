<?php // Initialize the session
include 'config.php';
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} ?>
<html lang="en">

<head>
    <title>Radsense - Radius MYSQL integration for pfsense</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Add NAS</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="addnas.php" method="post">
                    <div class="form-group">
                        <label>NAS Name</label>
                        <input type="text" name="nasname" class="form-control" placeholder="Enter NAS Name" required="">
                    </div>
                    <div class="form-group">
                        <label>Shortname</label>
                        <input type="text" name="shortname" class="form-control" placeholder="Enter Shortname" required="">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" placeholder="other" required="">
                    </div>
                    <div class="form-group">
                        <label>Ports</label>
                        <input type="number" name="ports" class="form-control" placeholder="Enter Port" required="">
                    </div>
                    <div class="form-group">
                        <label>Secret</label>
                        <input type="text" name="secret" class="form-control" placeholder="Enter Secret" required="">
                    </div>
                    <div class="form-group">
                        <label>Server</label>
                        <input type="server" name="server" class="form-control" placeholder="Enter Server" required="">
                    </div>
                    <div class="form-group">
                        <label>Community</label>
                        <input type="text" name="community" class="form-control" placeholder="Enter Community" required="">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description" required="">
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-3 px-4">Submit</button>
                </form>

            </div>

        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>
