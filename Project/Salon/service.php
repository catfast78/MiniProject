<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $details = $_POST["txt_details"];
    $price = $_POST["txt_price"];

    $insQry = "INSERT INTO tbl_service(service_name, service_details, service_price, salon_id) 
               VALUES('" . $name . "', '" . $details . "', '" . $price . "', '" . $_SESSION['sid'] . "')";
    if ($con->query($insQry)) {
        echo "Service inserted successfully.";
    }
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_service WHERE service_id=" . $did;
    if ($con->query($delQry)) {
        header("location:service.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services</title>

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

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            margin-top: 30px;
        }

        .btn-submit {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Form to Add New Service -->
        <div class="col-md-6 offset-md-3 form-container">
            <h2 class="text-center mb-4">Add New Service</h2>

            <form id="form1" name="form1" method="post" action="">
                <div class="mb-3">
                    <label for="txt_name" class="form-label">Service Name</label>
                    <input type="text" class="form-control" name="txt_name" id="txt_name" required>
                </div>

                <div class="mb-3">
                    <label for="txt_details" class="form-label">Service Details</label>
                    <input type="text" class="form-control" name="txt_details" id="txt_details" required>
                </div>

                <div class="mb-3">
                    <label for="txt_price" class="form-label">Service Price</label>
                    <input type="text" class="form-control" name="txt_price" id="txt_price" required>
                </div>

                <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary btn-submit" value="Submit" />
            </form>
        </div>

        <!-- Table to Display Services -->
        <div class="table-container">
            <h3 class="text-center mb-4">Available Services</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SI.No.</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selQry = "SELECT * FROM tbl_service WHERE salon_id=" . $_SESSION['sid'];
                    $result = $con->query($selQry);
                    $i = 0;
                    while ($data = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["service_name"]; ?></td>
                            <td><?php echo $data["service_details"]; ?></td>
                            <td><?php echo $data["service_price"]; ?></td>
                            <td>
                                <a href="service.php?did=<?php echo $data["service_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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
