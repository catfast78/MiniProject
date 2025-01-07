<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET['aid'])){
  echo $qry="UPDATE tbl_booking set booking_status='1' where booking_id=".$_GET['aid'];
  if($con->query($qry)){
    ?>
    <script>
      alert("Booking Accpeted")
      window.location="viewbooking.php"
    </script>
    <?php
  }
  else{
    ?>
<script>
  alert("Booking Accpeted")
  window.location="viewbooking.php"
</script>
    <?php
  }
}

if(isset($_GET['rid'])){
  $qry="UPDATE tbl_booking set booking_status='2' where booking_id=".$_GET['rid'];
  if($con->query($qry)){
    ?>
    <script>
      alert("Booking Rejected");
      window.location="viewbooking.php"
    </script>
    <?php
  }
  else{
    ?>
<script>
  alert("Booking Accpeted")
  window.location="viewbooking.php"
</script>
    <?php
  }
}
if(isset($_GET['aid'])){
  $qry="UPDATE FROM tbl_booking set booking_status=1 where booking_id=".$_GET['bid'];
  if($con->query($qry)){
    ?>
    <script>
      alert("Booking Accpeted")
      window.location="viewbooking.php"
    </script>
    <?php
  }
  else{
    ?>
<script>
  alert("Booking Accpeted")
  window.location="viewbooking.php"
</script>
    <?php
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bookings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f8f9fa;
  }
  .table-container {
    margin: 2rem auto;
    max-width: 800px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 1.5rem;
  }
  .table {
    border-collapse: separate;
    border-spacing: 0 15px;
  }
  .table th {
    background-color: #343a40;
    color: #ffffff;
  }
  .table td, .table th {
    vertical-align: middle;
  }
  .page-title {
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
  }
</style>
</head>

<body>
<h5><a href="SalonHome.php">Home</a></h5>
<div class="container">
  
  <h1 class="page-title">Bookings</h1>
  <div class="table-container">
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>SI.No.</th>
            <th>Date</th>
            <th>Time</th>
            <th>Service</th>
            <th>Price</th>
            <th>User</th>
            <th>Status</th>
            <th>Action</th>
        
          </tr>
        </thead>
        <tbody>
        <?php
          $selQry = "SELECT * FROM tbl_booking b 
                      INNER JOIN tbl_user u ON b.user_id = u.user_id 
                      INNER JOIN tbl_service s ON b.service_id = s.service_id 
                      WHERE s.salon_id = ".$_SESSION['sid'];
          $result = $con->query($selQry);
          $i = 0;
          while($data = $result->fetch_assoc()) {
            $i++;
        ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["booking_date"]; ?></td>
            <td><?php echo $data["booking_time"]; ?></td>
            <td><?php echo $data["service_name"]; ?></td>
            <td><?php echo $data["booking_amount"]; ?></td>
            <td><?php echo $data["user_name"]; ?></td>
            <td>
              <?php
                 if($data['booking_status']==0){
                  echo "New Booking";
                }
                else if($data['booking_status']==1){
                  echo "Booking Approved. Waiting for Payment";
                }
                else if($data['booking_status']==2){
                  echo "Booking rejected..";
                }
                else if($data['booking_status']==3){
                  echo "Payment Completed";
                }
              ?>
            </td>
            <td>
              <?php
                if($data['booking_status']==0){
                  ?>
                    <a href="viewbooking.php?aid=<?php echo $data['booking_id'] ?>">Accept Booking</a>
                  <br>
                  <br>
                    <a href="viewbooking.php?rid=<?php echo $data['booking_id'] ?>">Reject Booking</a>
                  <?php
                }
              ?>
            </td>
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
include("Head.php");
?>
