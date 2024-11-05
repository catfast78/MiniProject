<?php
include("Head.php");
include("SessionValidation.php");
include("../Assets/Connection/Connection.php");

$message = "";

if (isset($_POST["btnupdate"])) {
    $current = $_POST["txtcurrent"];
    $newpwd = $_POST["txtnew"];
    $confirm = $_POST["txtconfirm"];

    $selQry = "SELECT * FROM tbl_admin WHERE admin_id='" . $_SESSION["adminid"] . "' AND admin_password='" . $current . "'";
    $result = $con->query($selQry);
    if ($data = $result->fetch_assoc()) {
        if ($newpwd == $confirm) {
            $insQry = "UPDATE tbl_admin SET admin_password='" . $confirm . "' WHERE admin_id='" . $_SESSION["adminid"] . "'";
            if ($con->query($insQry)) {
                header("location:MyProfile.php");
            }
        } else {
            $message = "Passwords do not match...";
        }
    } else {
        $message = "Please check your old password...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            font-size: 1.5rem;
            font-weight: 600;
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }
        .alert {
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container form-container">
    <h3 class="form-header">Change Password</h3>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txtcurrent">Current Password</label>
            <input type="password" class="form-control" name="txtcurrent" id="txtcurrent" required />
        </div>
        <div class="form-group">
            <label for="txtnew">New Password</label>
            <input type="password" class="form-control" name="txtnew" id="txtnew" required />
        </div>
        <div class="form-group">
            <label for="txtconfirm">Confirm Password</label>
            <input type="password" class="form-control" name="txtconfirm" id="txtconfirm" required />
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="btnupdate" id="btnupdate" value="Submit" />
            <input type="reset" class="btn btn-secondary" name="btncancel" id="btncancel" value="Cancel" />
        </div>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </form>
    <div class="text-center mt-3">
        <a href="HomePage.php">Back to Home</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php include("Foot.php"); ?>
