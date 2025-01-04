<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Complaints</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f8f9fa;
  }
  .table-container {
    margin: 2rem auto;
    max-width: 1000px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 1.5rem;
  }
  .table th {
    background-color: #343a40;
    color: #ffffff;
    text-align: center;
  }
  .table td, .table th {
    vertical-align: middle;
    text-align: center;
  }
  .page-title {
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
  }
  .btn-reply {
    text-decoration: none;
    color: #ffffff;
  }
</style>
</head>

<body>
<div class="container">
  <h1 class="page-title">Complaints</h1>
  <div class="table-container">
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>SI.No</th>
            <th>Content</th>
             
            <th>Reply</th>
            <th>Date</th>
            <th>User</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $selQry = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id = u.user_id";
            $result = $con->query($selQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
              $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["complaint_content"]; ?></td>
             
            <td><?php echo $data["complaint_reply"]; ?></td>
            <td><?php echo $data["complaint_date"]; ?></td>
            <td><?php echo $data["user_name"]; ?></td>
            <td><a href="Reply.php?did=<?php echo $data["complaint_id"]; ?>" class="btn btn-sm btn-primary btn-reply">Reply</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>
