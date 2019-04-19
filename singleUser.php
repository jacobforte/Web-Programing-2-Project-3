<!doctype html>
<html lang="en">
    <head>
        <?php include("php/head.php"); ?>
        <title>Some Title</title>
    </head>
    <body>
        <?php
            include("php/header.php");
            include("php/singleUser/SingleUser.php");

            if (isset($_GET["id"]))
                $test = new SingleUser($_GET["id"]);

            if (!isset($test)) {
                echo '<div class="container"><div class="row"><div class="col-12">No user was found.</div></div></div>';
                return;
            }

        ?>

        <main>
            <div class="container mt-4">

                <?php $test->outputHeading(); ?>

                <div class="row">
                    <div class="col-12 col-md-8">

                        <?php $test->outputPosts(); ?>

                        <?php $test->outputImages(); ?>

                    </div>
                    <div class="col-12 col-md-4">

                        <?php $test->outputContact(); ?>

                    </div>
                </div>

            </div>
        </main>
        
        <?php include("php/footer.php"); ?>
    </body>
</html>