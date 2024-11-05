<?php include("Head.php"); ?>

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
        max-width: 900px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .action-buttons a {
        margin-right: 5px;
    }
</style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <h3 class="text-center mb-4">Unverified Salons</h3>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selQry="select * from tbl_salon where salon_s=0";
                        $result= $con->query($selQry);
                        $i=0;
                        while($data=$result->fetch_assoc())
                        {
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["salon_name"]; ?></td>
                        <td><?php echo $data["salon_email"]; ?></td>
                        <td><?php echo $data["salon_address"]; ?></td>
                        <td><img src="<?php echo $data["salon_photo"]; ?>" alt="Photo" style="width: 80px; height: auto;"></td>
                        <td><img src="<?php echo $data["salon_proof"]; ?>" alt="Proof" style="width: 80px; height: auto;"></td>
                        <td class="action-buttons">
                            <a href="Reject.php?did=<?php echo $data["salon_id"]; ?>" class="btn btn-danger btn-sm">Reject</a>
                            <a href="V.php?cid=<?php echo $data["salon_id"]; ?>" class="btn btn-success btn-sm">Accept</a>
                        </td>
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
