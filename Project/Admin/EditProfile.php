<?php
include("Head.php");
include("../Assets/Connection/Connection.php");

$selQry = "SELECT * FROM tbl_admin WHERE admin_id = '".$_SESSION["adminid"]."'";
$result = $con->query($selQry);
$data = $result->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txtname"];
    $email = $_POST["txtemail"];
    
    $insQry = "UPDATE tbl_admin SET admin_name = '".$name."', admin_email = '".$email."' WHERE admin_id = '".$_SESSION["adminid"]."'";
    if ($con->query($insQry)) {
        header("location:MyProfile.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container { max-width: 500px; margin: 30px auto; padding: 20px; background-color: #f8f9fa; border-radius: 8px; }
        .form-header { font-size: 1.5rem; font-weight: 600; color: #343a40; text-align: center; margin-bottom: 20px; }
    </style>
</head>

<body>

<div class="container form-container">
    <h3 class="form-header">Edit Profile</h3>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txtname">Name</label>
            <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $data["admin_name"]; ?>" required />
        </div>
        <div class="form-group">
            <label for="txtemail">Email</label>
            <input type="email" class="form-control" name="txtemail" id="txtemail" value="<?php echo $data["admin_email"]; ?>" required />
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Update" />
            <input type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel" value="Cancel" />
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include("Foot.php");
?>
