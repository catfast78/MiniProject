<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Salon List</title>

  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/6QtbM5Q1iQZm1LLAoIu/E/s7QpR/zf5uFK93jI" crossorigin="anonymous">
  
  <!-- Custom CSS for margin and table styling -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .form-container {
      margin-top: 30px;
    }

    .table img {
      border-radius: 5px;
    }

    .table td {
      vertical-align: middle;
    }

    .search-table {
      margin-top: 20px;
    }
  </style>
</head>

<body>
<!-- Form Section -->
<div class="container form-container">
  <form>
    <div class="row mb-3">
      <label for="sel_district" class="col-sm-2 col-form-label">District</label>
      <div class="col-sm-10">
        <select class="form-select" name="sel_district" id="sel_district" onchange="getPlace(this.value)">
          <option>--Select--</option>
          <?php
            $selQry1 = "select * from tbl_district";
            $resultOne = $con->query($selQry1);
            while ($data = $resultOne->fetch_assoc()) {
          ?>
          <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="row mb-3">
      <label for="sel_place" class="col-sm-2 col-form-label">Place</label>
      <div class="col-sm-10">
        <select class="form-select" name="sel_place" id="sel_place" onchange="getSalon(this.value)">
          <option>--Select--</option>
        </select>
      </div>
    </div>
  </form>
</div>

<!-- Search Results Section -->
<div class="container search-table">
  <form id="form1" name="form1" method="post" action="">
    <div id="search">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">SI. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Photo</th>
            <th scope="col">Proof</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $selQry = "select * from tbl_salon";
            $result = $con->query($selQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
              $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['salon_name']; ?></td>
            <td><?php echo $data['salon_email']; ?></td>
            <td><?php echo $data['salon_address']; ?></td>
            <td><img src="../Assets/Files/salon/photo/<?php echo $data['salon_photo']; ?>" width="50" /></td>
            <td><img src="../Assets/Files/salon/Proof/<?php echo $data['salon_proof']; ?>" width="50" /></td>
            <td>
              <a href="viewservice.php?did=<?php echo $data['salon_id']; ?>" class="btn btn-sm btn-primary">Services</a>
              <a href="complaint.php?cid=<?php echo $data['salon_id']; ?>" class="btn btn-sm btn-danger">Complaints</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </form>
</div>

<!-- jQuery and Ajax Scripts -->
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {
        $("#sel_place").html(result);
      }
    });
  }

  function getSalon(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSearchSalon.php?did=" + did,
      success: function (result) {
        $("#search").html(result);
      }
    });
  }
</script>

<!-- Include Bootstrap JS (Optional for some components like modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
ob_flush();
include("Foot.php");
?>
