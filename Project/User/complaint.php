<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

if(isset($_POST["btn_submit"])) {
    $content = $_POST["textarea"];
    $insQry = "INSERT INTO tbl_complaint(complaint_content, complaint_date, user_id, salon_id) 
                VALUES ('".$content."', CURDATE(), '".$_SESSION['aid']."', '".$_GET['cid']."')";
    
    if($con->query($insQry)) {
        echo "<div class='alert alert-success'>Complaint submitted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error in submitting complaint.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #deca89, #fbc02d); /* Yellow gradient background */
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #f57f17;
            text-align: center;
        }
        .btn-primary {
            background-color: #fbc02d;
            border-color: #fbc02d;
        }
        .btn-primary:hover {
            background-color: #f57f17;
            border-color: #f57f17;
        }
        .alert {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
  <a href="UserHome.php">Home</a>
    <div class="container">
        <h2>Submit Your Complaint</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="textarea">Complaint</label>
                <textarea class="form-control" name="textarea" id="textarea" rows="5" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Submit</button>
                <a href="UserHome.php" class="btn btn-secondary">Back to Home</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
ob_flush();

?>
