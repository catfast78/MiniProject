<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../Assets/JQ/jQuery.js"></script>
    <style>
        /* Add gradient background to the form container */
        .form-container {
            background: linear-gradient(to right, #FFD700, #FFA500); /* Yellow gradient */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4">User Registration</h2>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input required type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter Name" 
                       title="Name allows only alphabets, spaces, and the first letter must be capital" 
                       pattern="^[A-Z][a-zA-Z ]*$"/>
            </div>

            <div class="form-group">
                <label for="txt_email">Email</label>
                <input required type="email" class="form-control" name="txt_email" id="txt_email" placeholder="Enter Email"/>
            </div>

            <div class="form-group">
                <label for="txt_pwd">Password</label>
                <input required type="password" class="form-control" name="txt_pwd" id="txt_pwd" placeholder="Enter Password" 
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                       title="Password must be at least 8 characters, include one uppercase letter, one lowercase letter, and one number"/>
            </div>

            <div class="form-group">
                <label for="sel_district">District</label>
                <select name="sel_district" class="form-control" onchange="getPlace(this.value)" id="sel_district">
                    <option>--select--</option>
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
                <select name="sel_place" class="form-control" id="sel_place">
                    <option>--select--</option>
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
                <label for="File_photo">Photo</label>
                <input type="file" class="form-control-file" name="File_photo" id="File_photo" required/>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                <button type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
            </div>
        </form>
        <a href="../Guest/Login.php" class="btn btn-primary">Login</a>
    </div>
</div>

<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
            success: function (result) {
                $("#sel_place").html(result);
            }
        });
    }
</script>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
