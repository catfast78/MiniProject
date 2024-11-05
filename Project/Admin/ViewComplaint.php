<?php include("Head.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Content List</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        padding-top: 20px;
    }
    .table-container {
        max-width: 800px;
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
        <h3 class="text-center mb-4">Content List</h3>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>SI.No.</th>
                        <th>Content</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sample Content</td>
                        <td>John Doe</td>
                        <td>2024-10-30</td>
                        <td><a href="Reply.php" class="btn btn-primary btn-sm">Reply</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Another Content</td>
                        <td>Jane Smith</td>
                        <td>2024-10-29</td>
                        <td><a href="Reply.php" class="btn btn-primary btn-sm">Reply</a></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php include("Foot.php"); ?>
