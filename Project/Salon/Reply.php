<?php
include("Head.php");
include("../Assets/Connection/Connection.php");

if (isset($_POST["btn_submit"])) {
    $content = $_POST["txt_reply"];
    $insQry = "UPDATE tbl_complaint SET complaint_reply = '$content' WHERE complaint_id = " . $_GET["did"];
  
    if ($con->query($insQry)) {
        echo "<div class='alert alert-success'>Reply submitted successfully!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Reply</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
  }
  .reply-container {
    max-width: 500px;
    margin: 50px auto;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .form-label {
    font-weight: 600;
    color: #343a40;
  }
  .btn-submit {
    background-color: #007bff;
    border: none;
    font-weight: bold;
    width: 100%;
  }
</style>
</head>

<body>
<div class="container reply-container">
  <h3 class="text-center mb-4">Reply to Complaint</h3>
  <form id="form1" name="form1" method="post" action="">
    <div class="mb-3">
      <label for="txt_reply" class="form-label">Reply</label>
      <textarea name="txt_reply" id="txt_reply" class="form-control" rows="4" placeholder="Type your reply here..."></textarea>
    </div>
    <div class="d-grid gap-2">
      <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary btn-submit">Submit</button>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
?>
