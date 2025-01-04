<?php

//session_start();
include("Head.php");


include("../Assets/Connection/Connection.php");





	$selQry="select * from tbl_user where user_id='".$_SESSION["aid"]."'";
  	$result= $con->query($selQry);
  	$data=$result->fetch_assoc();
 		

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Profile</title>
  
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/6QtbM5Q1iQZm1LLAoIu/E/s7QpR/zf5uFK93jI" crossorigin="anonymous">
  
  <style>
    body {
      background-color: #f8f9fa;
    }

    .profile-container {
      margin-top: 50px;
    }

    .profile-card {
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
    }

    .profile-image img {
      border-radius: 50%;
      width: 150px;
      height: 150px;
    }

    .profile-actions a {
      margin: 5px;
    }

    .profile-actions a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <div class="container mt-3">
     
    <hr>
  </div>

  <!-- Profile Section -->
  <div class="container profile-container">
    <div class="row justify-content-center">
      <div class="col-md-6 profile-card text-center">
        <h3>My Profile</h3>
        <div class="profile-image my-3">
          <img src="../Assets/Files/Users/<?php echo $data['user_photo']; ?>" alt="Profile Picture">
        </div>
        <table class="table table-borderless text-start">
          <tr>
            <th>Name</th>
            <td><?php echo $data['user_name']; ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?php echo $data['user_email']; ?></td>
          </tr>
        </table>
        <div class="profile-actions mt-3">
          <a href="EditProfile.php" class="btn btn-outline-primary">Edit Profile</a>
          <a href="ChangePassword.php" class="btn btn-outline-secondary">Change Password</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS (Optional, for certain components like modals) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
include("Foot.php")
?>