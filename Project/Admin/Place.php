<?php
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{   
    $district = $_POST["sel_district"];
    $pname = $_POST["txt_pname"];
    $pcode = $_POST["txt_pcode"];
    
    $insQry = "INSERT INTO tbl_place(district_id, place_name, place_pincode) VALUES('$district', '$pname', '$pcode')";
    if($con->query($insQry)) {
        echo "<div class='alert alert-success text-center'>Inserted successfully!</div>";
    }
}

if(isset($_GET["did"])) {
    $did = $_GET["did"];
    $upQry = "DELETE FROM tbl_place WHERE place_id = $did";
    if($con->query($upQry)) {
        header("location:Place.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Places</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .container { margin-top: 20px; }
    .table-container { margin-top: 30px; }
    .form-container { background-color: #f8f9fa; padding: 20px; border-radius: 8px; }
    .table th, .table td { text-align: center; }
</style>
</head>

<body>

<div class="container">
    <a href="HomePage.php" class="btn btn-secondary mb-3">Home</a>

    <div class="form-container">
        <h3 class="text-center">Add New Place</h3>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="sel_district">District</label>
                <select name="sel_district" id="sel_district" class="form-control">
                    <option>--Select--</option>
                    <?php
                    $selOptionQry = "SELECT * FROM tbl_district";
                    $optionResult = $con->query($selOptionQry);
                    while($optiondata = $optionResult->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $optiondata["district_id"]; ?>">
                        <?php echo $optiondata["district_name"]; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_pname">Place</label>
                <input type="text" name="txt_pname" id="txt_pname" class="form-control" />
            </div>
            <div class="form-group">
                <label for="txt_pcode">Pincode</label>
                <input type="text" name="txt_pcode" id="txt_pcode" class="form-control" />
            </div>
            <div class="text-center">
                <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Submit</button>
                <button type="reset" name="btn_cancel" id="btn_cancel" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <div class="table-container">
        <h3 class="text-center mt-5">Existing Places</h3>
        <table class="table table-bordered table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>SI.No.</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>Pincode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selQry = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
                $result = $con->query($selQry);
                $i = 0;
                while($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data["district_name"]; ?></td>
                    <td><?php echo $data["place_name"]; ?></td>
                    <td><?php echo $data["place_pincode"]; ?></td>
                    <td>
                        <a href="Place.php?did=<?php echo $data["place_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php } ?>
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
