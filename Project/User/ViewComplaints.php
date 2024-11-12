<?php 
session_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

/*$salon_id = isset($_GET['salon_id']) ? $_GET['salon_id'] : 0; // Get the salon_id from the URL or default to 0 if not set

// Ensure the salon_id is valid
if($salon_id <= 0) {
    echo "<div class='alert alert-danger'>Invalid salon ID.</div>";
    exit;
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Complaints for Salon</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        padding-top: 20px;
    }
    .table-container {
        min-width: 900px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <h3 class="text-center mb-4">Complaints for Salon</h3>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>SI.No.</th>
                        <th>Content</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch complaints for the specific salon
                    $query = "SELECT *
                              FROM tbl_complaint c 
                             Inner JOIN tbl_user u  ON c.user_id = u.user_id  where u.user_id = ".$_SESSION['aid']."    
                                ORDER BY c.complaint_date DESC"; // Using a prepared statement for security
                    $result = $con->query($query);
                   
                    
                    if ($result->num_rows > 0) {
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $counter++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['complaint_content']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
                            echo "<td>" . $row['complaint_date'] . "</td>";
                            echo "<td>".  $row['complaint_reply'] ." </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No complaints available for this salon.</td></tr>";
                    }
                    
                    // Close the statement
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php include("Foot.php"); ?>
