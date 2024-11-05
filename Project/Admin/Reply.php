<?php include("Head.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reply Form</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        padding-top: 20px;
    }
    .form-container {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
</head>

<body>

<div class="container">
    <div class="form-container">
        <h3 class="text-center mb-4">Submit Your Reply</h3>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txt_reply">Reply</label>
                <input type="text" name="txt_reply" id="txt_reply" class="form-control" placeholder="Enter your reply here">
            </div>
            <div class="text-center">
                <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Submit</button>
            </div>
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
