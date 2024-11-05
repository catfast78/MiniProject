<?php
include("Head.php");
include("../Assets/Connection/Connection.php");

$selQry = "SELECT * FROM tbl_admin WHERE admin_id = '".$_SESSION["adminid"]."'";
$result = $con->query($selQry);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Profile</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .profile-container { max-width: 500px; margin: 30px auto; background-color: #f8f9fa; padding: 20px; border-radius: 8px; }
    .profile-header { font-size: 1.5rem; font-weight: 600; color: #343a40; text-align: center; margin-bottom: 15px; }
    .profile-table td { padding: 10px; font-size: 1rem; }
    .profile-table td:first-child { font-weight: 500; color: #495057; }
    .action-links { text-align: center; margin-top: 15px; }
</style>
</head>

<body>

<div class="container profile-container">
    <h3 class="profile-header">Admin Profile</h3>
    <table class="table profile-table">
        <tr>
            <td>Name</td>
            <td><?php echo $data["admin_name"]; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $data["admin_email"]; ?></td>
        </tr>
    </table>
    <div class="action-links">
        <a href="EditProfile.php" class="btn btn-primary btn-sm">Edit Profile</a>
        <a href="ChangePassword.php" class="btn btn-warning btn-sm">Change Password</a>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php include("Foot.php"); ?>
