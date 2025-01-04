<?php
include("Head.php");
ob_start();

include("../Assets/Connection/Connection.php");

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "delete from tbl_user where user_id=" . $did;
    if ($con->query($delQry)) {
        // header("Location: ViewSalon.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User List</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        padding-top: 20px;
        background-color: #f8f9fa;
    }
    .table-container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .home-link {
        margin-bottom: 15px;
    }
    .user-img {
        width: 80px;
        border-radius: 4px;
    }
</style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <a href="HomePage.php" class="btn btn-primary home-link">Home</a>
        <h2 class="text-center">User List</h2>
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>SI.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Proof</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selQry = "select * from tbl_user";
                $result = $con->query($selQry);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data["user_name"]; ?></td>
                    <td><?php echo $data["user_email"]; ?></td>
                    <td><img src="../Assets/Files/Users/<?php echo $data["user_photo"]; ?>" class="user-img" /></td>
                    <td>
                        <a href="ViewUsers.php?did=<?php echo $data["user_id"]; ?>" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

</body>
</html>

<?php 
include("Foot.php");
ob_flush();
?>
