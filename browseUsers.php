<!doctype html>
<html lang="en">
<head>
    <?php include("php/head.php"); ?>
    <title>Some Title</title>
</head>
<body>
<?php include("php/header.php"); ?>
<?php include("php/browseUsers/outputUsers.php"); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="font-weight-bold mb-3">Browse Users</h3>
            </div>
        </div>
        <?php outputUsers(); ?>
    </div>
</main>

<?php include("php/footer.php"); ?>
</body>
</html>