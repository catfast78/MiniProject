<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $address = $_POST["txt_address"];
    $contact = $_POST["txt_contact"];
    $district = $_POST["sel_district"];
    $place = $_POST["sel_place"];
    $password = $_POST["txt_pwd"];
    $photo = $_FILES["file_photo"]["name"];
    $tempphoto = $_FILES["file_photo"]["tmp_name"];
    $proof = $_FILES["file_proof"]["name"];
    $tempproof = $_FILES["file_proof"]["tmp_name"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $errors = [];

    // Server-side validation
    if (!preg_match("/^[A-Z][a-zA-Z ]*$/", $name)) {
        $errors[] = "Name must start with an uppercase letter and contain only alphabets and spaces.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match("/^[7-9][0-9]{9}$/", $contact)) {
        $errors[] = "Contact number must start with 7-9 and be 10 digits long.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    if (empty($district) || empty($place) || $district == "--select--" || $place == "--select--") {
        $errors[] = "Please select both district and place.";
    }
    if (!in_array(strtolower(pathinfo($photo, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
        $errors[] = "Only JPG, JPEG, and PNG files are allowed for the photo.";
    }
    if (!in_array(strtolower(pathinfo($proof, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'pdf'])) {
        $errors[] = "Only JPG, JPEG, PNG, and PDF files are allowed for the proof.";
    }

    // If no errors, proceed with file uploads and database insertion
    if (empty($errors)) {
        move_uploaded_file($tempphoto, "../Assets/Files/salon/photo/" . $photo);
        move_uploaded_file($tempproof, "../Assets/Files/salon/Proof/" . $proof);
        
        // Insert into database
        $stmt = $con->prepare("INSERT INTO tbl_salon (salon_name, salon_email, salon_address, salon_district, salon_place, salon_photo, salon_proof, salon_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $email, $address, $district, $place, $photo, $proof, $hashed_password);
        
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Inserted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Insertion failed.</div>";
        }

        $stmt->close();
    } else {
        // Display all validation errors
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
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
    <style>
        /* Custom Styling */
        body { background: linear-gradient(135deg, #fceabb, #f8b500); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 30px; max-width: 600px; margin-top: 20px; }
        h2 { color: #f8b500; font-weight: bold; }
        .btn-primary { background-color: #f8b500; border-color: #f8b500; }
        .btn-primary:hover { background-color: #e0a700; border-color: #e0a700; }
    </style>
</head>
<body>
<div class="container mt-5">
<div >
        <a href="../index.php">Home</a>
            </div>
    <h2 class="mb-4">Register Salon</h2>
    <form method="post" enctype="multipart/form-data" id="salonForm">
        <div class="form-group">
            <label for="txt_name">Name</label>
            <input type="text" class="form-control" name="txt_name" id="txt_name" required placeholder="Name" pattern="^[A-Z][a-zA-Z ]*$" title="Name must start with an uppercase letter and contain only alphabets and spaces." />
        </div>

        <div class="form-group">
            <label for="txt_contact">Contact</label>
            <input type="text" class="form-control" name="txt_contact" id="txt_contact" required placeholder="Number" pattern="[7-9]{1}[0-9]{9}" title="Phone number must start with 7-9 and contain 10 digits." />
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
            </select>
        </div>

        <div class="form-group">
            <label for="file_photo">Photo</label>
            <input type="file" class="form-control-file" name="file_photo" id="file_photo" required accept=".jpg, .jpeg, .png" />
        </div>

        <div class="form-group">
            <label for="file_proof">Proof</label>
            <input type="file" class="form-control-file" name="file_proof" id="file_proof" required accept=".jpg, .jpeg, .png, .pdf" />
        </div>

        <div class="form-group">
            <label for="txt_pwd">Password</label>
            <input type="password" class="form-control" name="txt_pwd" id="txt_pwd" required minlength="8" placeholder="Enter Password" title="Password must be at least 8 characters long." />
        </div>

        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
    </form>
    <div class="text-center p-3">
        <a href="Login.php">Login</a>
            </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sel_district').change(function() {
            var districtId = $(this).val();
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php",
                method: "GET",
                data: { did: districtId },
                success: function(data) {
                    $('#sel_place').html(data);
                }
            });
        });
    });
</script>
</body>
</html>
