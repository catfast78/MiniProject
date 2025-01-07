<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_salon WHERE salon_id=" . $did;
    if ($con->query($delQry)) {
        //header("location:ViewSalon.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Verified Salons</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        padding-top: 20px;
    }
    .table-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <h3 class="text-center mb-4">Verified Salons</h3>
        <div class="mb-3 text-center">
            <a href="HomePage.php" class="btn btn-secondary btn-sm">HOME</a>
            <a href="ViewSalon.php" class="btn btn-secondary btn-sm">Unverified Salons</a>
        </div>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>SI.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Photo</th>
                        <th>Proof</th>
                        <th colspan=2>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selQry = "SELECT * FROM tbl_salon WHERE salon_status=1";
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
                        <td><img src="../Assets/Files/salon/photo/<?php echo $data["salon_photo"]; ?>" width="100" class="img-thumbnail" /></td>
                        <td><img src="../Assets/Files/salon/Proof/<?php echo $data["salon_proof"]; ?>" width="100" class="img-thumbnail" /></td>
                        <td><a href="Verified.php?did=<?php echo $data["salon_id"]; ?>" class="btn btn-danger btn-sm">Remove</a></td>
                        <td><a href="ViewComplaint.php?cid=<?php echo $data["salon_id"]; ?>" class="btn btn-danger btn-sm">Complaints</a></td>
 
                     </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php include("Foot.php"); ?>
