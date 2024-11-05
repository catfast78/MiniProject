<?php
include("Head.php");
$dname = "";
$eid = 0;

include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $dname = $_POST["txt_dname"];
    $eid = $_POST["txt_eid"];
    if ($eid == 0) {
        $insQry = "INSERT INTO tbl_district (district_name) VALUES('" . $dname . "')";
        if ($con->query($insQry)) {
            echo "inserted";
        }
    } else {
        $upQry = "UPDATE tbl_district SET district_name='" . $dname . "' WHERE district_id =" . $eid;
        if ($con->query($upQry)) {
            header("location:DistrictRegistration.php");
        }
    }
}

if (isset($_GET["eid"])) {
    $eid = $_GET["eid"];
    $seldistrict = "SELECT * FROM tbl_district WHERE district_id=" . $eid;
    $selresult = $con->query($seldistrict);
    $seldata = $selresult->fetch_assoc();
    $dname = $seldata["district_name"];
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $upQry = "DELETE FROM tbl_district WHERE district_id =" . $did;
    if ($con->query($upQry)) {
        header("location:DistrictRegistration.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>District Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
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
        .table-container {
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>

<body>

<div class="container form-container">
    <h3 class="form-header">District Registration</h3>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txt_dname">District Name</label>
            <input type="text" class="form-control" value="<?php echo $dname; ?>" name="txt_dname" id="txt_dname" required />
            <input type="hidden" value="<?php echo $eid; ?>" name="txt_eid" id="txt_eid" />
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
        </div>
    </form>
</div>

<div class="container table-container">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>SINo.</th>
                <th>District Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "SELECT * FROM tbl_district";
            $result = $con->query($selQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data["district_name"]; ?></td>
                <td>
                    <a href="DistrictRegistration.php?did=<?php echo $data["district_id"]; ?>" class="text-danger">Delete</a>
                    <a href="DistrictRegistration.php?eid=<?php echo $data["district_id"]; ?>" class="text-primary">Edit</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include("Foot.php");
?>
