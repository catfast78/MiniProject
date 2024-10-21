<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

$selQry = "SELECT * FROM tbl_user WHERE user_id='" . $_SESSION["aid"] . "'";
$result = $con->query($selQry);
$data = $result->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txtname"];
    $email = $_POST["txtemail"];

    $insQry = "UPDATE tbl_user SET user_name='" . $name . "', user_email='" . $email . "' WHERE user_id='" . $_SESSION["aid"] . "'";
    if ($con->query($insQry)) {
        header("location:MyProfile.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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

        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-update {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="col-md-6 offset-md-3 form-container">
            <h2 class="form-title">Edit Profile</h2>

            <form id="form1" name="form1" method="post" action="">
                <div class="mb-3">
                    <label for="txtname" class="form-label">Name</label>
                    <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $data["user_name"] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="txtemail" class="form-label">Email</label>
                    <input type="email" class="form-control" name="txtemail" id="txtemail" value="<?php echo $data["user_email"] ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary btn-update" value="Update" />
                    <input type="reset" name="btn_cancel" id="btn_cancel" class="btn btn-secondary" value="Cancel" />
                </div>
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
