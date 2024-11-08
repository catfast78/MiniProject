<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $address = $_POST["txt_address"];
    $district = $_POST["sel_district"];
    $place = $_POST["sel_place"];

    $photo = $_FILES["file_photo"]["name"];
    $tempphoto = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($tempphoto, "../Assets/Files/salon/photo/" . $photo);

    $proof = $_FILES["file_proof"]["name"];
    $tempproof = $_FILES["file_proof"]["tmp_name"];
    move_uploaded_file($tempproof, "../Assets/Files/salon/Proof/" . $proof);

    $password = $_POST["txt_pwd"];

    $insQry = "insert into tbl_salon(salon_name, salon_email, salon_address, salon_district, salon_place, salon_photo, salon_proof, salon_password) values('" . $name . "','" . $email . "','" . $address . "','" . $district . "','" . $place . "','" . $photo . "','" . $proof . "','" . $password . "')";
    if ($con->query($insQry)) {
        echo "<div class='alert alert-success'>Inserted successfully!</div>";
    }
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "delete from tbl_salon where salon_id=" . $did;
    if ($con->query($delQry)) {
        header("Location: salon.php");
        exit(); // Ensure script termination after redirect
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Salon Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Custom Style for Background Gradient -->
    <style>
        /* Yellow Gradient Background */
        body {
            background: linear-gradient(135deg, #fceabb, #f8b500);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        /* Center and style the form container */
        .container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin-top: 20px;
        }

        h2 {
            color: #f8b500;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #f8b500;
            border-color: #f8b500;
        }

        .btn-primary:hover {
            background-color: #e0a700;
            border-color: #e0a700;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <h2 class="mb-4">Register Salon</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txt_name">Name</label>
            <input type="text" class="form-control" name="txt_name" id="txt_name" required placeholder="Name" />
        </div>
        
        <div class="form-group">
            <label for="txt_contact">Contact</label>
            <input type="text" class="form-control" name="txt_contact" id="txt_contact" required placeholder="Number" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits 0-9"/>
        </div>

        <div class="form-group">
            <label for="txt_address">Address</label>
            <input type="text" class="form-control" name="txt_address" id="txt_address" required placeholder="Enter Address" />
        </div>

        <div class="form-group">
            <label for="txt_email">Email</label>
            <input type="email" class="form-control" name="txt_email" id="txt_email" required placeholder="Enter Email" />
        </div>

        <div class="form-group">
            <label for="sel_district">District</label>
            <select class="form-control" name="sel_district" id="sel_district" required>
                <option value="">--Select--</option>
                <?php
                $selQry1 = "select * from tbl_district";
                $resultOne = $con->query($selQry1);
                while ($data = $resultOne->fetch_assoc()) {
                    echo "<option value='{$data["district_id"]}'>{$data["district_name"]}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sel_place">Place</label>
            <select class="form-control" name="sel_place" id="sel_place" required>
                <option value="">--Select--</option>
                <?php
                $selQry2 = "select * from tbl_place";
                $resultTwo = $con->query($selQry2);
                while ($data = $resultTwo->fetch_assoc()) {
                    echo "<option value='{$data["place_id"]}'>{$data["place_name"]}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="file_photo">Photo</label>
            <input type="file" class="form-control-file" name="file_photo" id="file_photo" required />
        </div>

        <div class="form-group">
            <label for="file_proof">Proof</label>
            <input type="file" class="form-control-file" name="file_proof" id="file_proof" required />
        </div>

        <div class="form-group">
            <label for="txt_pwd">Password</label>
            <input type="password" class="form-control" name="txt_pwd" id="txt_pwd" required />
        </div>

        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
