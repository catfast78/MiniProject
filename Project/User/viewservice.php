<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service List</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .btn-book {
      background-color: #007bff;
      color: white;
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 4px;
    }
    .btn-book:hover {
      background-color: #0056b3;
    }
    .container {
      margin-top: 30px;
    }
    h2 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Available Services</h2>

  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">SI. No.</th>
        <th scope="col">Name</th>
        <th scope="col">Details</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $selQry = "SELECT * FROM tbl_service WHERE salon_id=" . $_GET['did'];
        $result = $con->query($selQry);
        $i = 0;

        while ($data = $result->fetch_assoc()) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data["service_name"]; ?></td>
        <td><?php echo $data["service_details"]; ?></td>
        <td><?php echo $data["service_price"]; ?></td>
        <td><a href="booking.php?did=<?php echo $data["service_id"]; ?>" class="btn-book">Book</a></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS (Optional for components like modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
ob_flush();
include("Foot.php");
?>
