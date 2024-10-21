<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $date = $_POST["txt_date"];
    $time = $_POST["txt_time"];
    $selQry = "SELECT * FROM tbl_service WHERE salon_id=" . $_GET['did'];
    $result = $con->query($selQry);
    $data = $result->fetch_assoc();
    $amount = $data["service_price"];

    $insQry = "INSERT INTO tbl_booking(booking_date, booking_time, booking_amount, user_id, service_id) VALUES ('" . $date . "', '" . $time . "', '" . $amount . "', '" . $_SESSION["aid"] . "', '" . $_GET["did"] . "')";
    if ($con->query($insQry)) {
        echo "<div class='alert alert-success'>Booking successfully inserted!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-submit {
            width: 100%;
        }

        .alert-success {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container col-md-6 offset-md-3">
            <h2 class="text-center mb-4">Book a Service</h2>

            <form id="form1" name="form1" method="post" action="">
                <div class="mb-3">
                    <label for="txt_date" class="form-label">Date</label>
                    <input type="date" name="txt_date" id="txt_date" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label for="txt_time" class="form-label">Time</label>
                    <input type="time" name="txt_time" id="txt_time" class="form-control" required />
                </div>

                <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary btn-submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
ob_flush();
include("Foot.php");
?>
