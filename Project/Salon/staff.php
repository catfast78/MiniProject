<?php
ob_start();
include("Head.php");

session_start();
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $contact = $_POST["txt_contact"];
    $photo = $_FILES["File_photo"]["name"];
    $tempphoto = $_FILES["File_photo"]["tmp_name"];
    move_uploaded_file($tempphoto, "../Assets/Files/salon/staff/" . $photo);

    $insQry = "insert into tbl_staff(staff_name,staff_email,staff_contact,staff_photo,salon_id) values('" . $name . "','" . $email . "','" . $contact . "','" . $photo . "','" . $_SESSION['sid'] . "')";
    if ($con->query($insQry)) {
        echo "<div class='alert alert-success'>Inserted successfully!</div>";
    }
}

if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $delQry = "delete from tbl_staff where staff_id=" . $did;
    if ($con->query($delQry)) {
        header("Location: staff.php");
        exit(); // Ensure script termination after redirect
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <h2 class="mb-4">Add Staff</h2>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="form-group">
            <label for="txt_name">Name</label>
            <input required type="text" class="form-control" name="txt_name" id="txt_name" />
        </div>
        <div class="form-group">
            <label for="txt_email">Email</label>
            <input required type="email" class="form-control" name="txt_email" id="txt_email" />
        </div>
        <div class="form-group">
            <label for="txt_contact">Contact</label>
            <input required type="text" class="form-control" name="txt_contact" id="txt_contact" />
        </div>
        <div class="form-group">
            <label for="File_photo">Photo</label>
            <input required type="file" class="form-control-file" name="File_photo" id="File_photo" />
        </div>
        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
    </form>

    <h2 class="mt-5">Staff List</h2>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>SI.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_staff where salon_id=" . $_SESSION['sid'];
            $result = $con->query($selQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data["staff_name"]; ?></td>
                <td><?php echo $data["staff_email"]; ?></td>
                <td><?php echo $data["staff_contact"]; ?></td>
                <td><img src="../Assets/Files/salon/staff/<?php echo $data["staff_photo"]; ?>" alt="Photo" style="width:50px; height:auto;"></td>
                <td><a href="staff.php?did=<?php echo $data["staff_id"]; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
ob_flush();
include("Foot.php");
?>
