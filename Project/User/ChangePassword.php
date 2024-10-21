<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

$message = "";

if (isset($_POST["btnupdate"])) {
    $current = $_POST["txtcurrent"];
    $newpwd = $_POST["txtnew"];
    $confirm = $_POST["txtconfirm"];

    $selQry = "SELECT * FROM tbl_user WHERE user_id='" . $_SESSION["aid"] . "' AND user_password='" . $current . "'";
    $result = $con->query($selQry);
    if ($data = $result->fetch_assoc()) {
        if ($newpwd == $confirm) {
            $insQry = "UPDATE tbl_user SET user_password='" . $confirm . "' WHERE user_id='" . $_SESSION["aid"] . "'";
            if ($con->query($insQry)) {
                header("location:MyProfile.php");
            }
        } else {
            $message = "Passwords do not match.";
        }
    } else {
        $message = "Please check your current password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

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

        .btn-submit {
            width: 100%;
        }

        .alert-message {
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="col-md-6 offset-md-3 form-container">
            <h2 class="form-title">Change Password</h2>

            <form id="form1" name="form1" method="post" action="">

                <div class="mb-3">
                    <label for="txtcurrent" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="txtcurrent" id="txtcurrent" required>
                </div>

                <div class="mb-3">
                    <label for="txtnew" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="txtnew" id="txtnew" required>
                </div>

                <div class="mb-3">
                    <label for="txtconfirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="txtconfirm" id="txtconfirm" required>
                </div>

                <button type="submit" name="btnupdate" id="btnupdate" class="btn btn-primary btn-submit">Submit</button>
                <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary btn-submit mt-2">Cancel</button>

                <div class="alert-message mt-3"><?php echo $message; ?></div>

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
