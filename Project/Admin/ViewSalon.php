<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_GET["aid"])) {
    $aid = $_GET["aid"];
    $UpQry = "update tbl_salon set salon_status=1 where salon_id=" . $aid;
    $con->query($UpQry);
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "delete from tbl_salon where salon_id=" . $did;
    $con->query($delQry);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Unverified Salons</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        padding-top: 20px;
    }
    .table-container {
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-container {
        display: flex;
        justify-content: space-between;
    }
    .btn-action {
        margin: 0 5px;
    }
</style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <div class="btn-container mb-3">
            <a href="HomePage.php" class="btn btn-primary">Home</a>
            <a href="Verified.php" class="btn btn-success">Approved Salons</a>
        </div>
        <h3 class="text-center">Unverified Salons</h3>
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>SI.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Proof</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selQry = "select * from tbl_salon where salon_status=0";
                $result = $con->query($selQry);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data["salon_name"]; ?></td>
                    <td><?php echo $data["salon_email"]; ?></td>
                    <td><?php echo $data["salon_address"]; ?></td>
                    <td><img src="../Assets/Files/Salons/<?php echo $data["salon_photo"]; ?>" width="80" class="rounded"></td>
                    <td><img src="../Assets/Files/Salons/<?php echo $data["salon_proof"]; ?>" width="80" class="rounded"></td>
                    <td>
                        <a href="ViewSalon.php?did=<?php echo $data["salon_id"]; ?>" class="btn btn-danger btn-action">Reject</a>
                        <a href="ViewSalon.php?aid=<?php echo $data["salon_id"]; ?>" class="btn btn-success btn-action">Accept</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php include("Foot.php"); ?>
