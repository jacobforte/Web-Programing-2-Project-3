<?php
function outputImagesOnCountries($CountryCodeISO) {
    require_once("php/dbconnection.function.php");

    $result = dbconnection("spSelectImagesOnCountry(\"{$CountryCodeISO}\")");

    foreach ($result as $row) {
        echo "<div class='col-lg-3 col-md-4 col-sm-6'>
            <div class='card mx-2 my-1'>
                <a href='singleImage.php?id={$row["ImageID"]}'><img src='travel-images/square-medium/{$row["Path"]}' alt='Error' class='img-fluid card-img px-4 py-2'></a>
            </div>
        </div>";
    }
}

function outputImagesOnPosts($postID) {
    require_once("php/dbconnection.function.php");

    $result = dbconnection("spSelectImagesOnPost(\"{$postID}\")");

    foreach ($result as $row) {
        echo "<div class='col-lg-3 col-md-4 col-sm-6'>
            <div class='card mx-2 my-1'>
                <a href='singleImage.php?id={$row["ImageID"]}'><img src='travel-images/square-medium/{$row["Path"]}' alt='Error' class='img-fluid card-img px-4 py-2'></a>
            </div>
        </div>";
    }
}

function outputReviewSection($imageId) {
    require_once("php/dbconnection.function.php");
    $reviews = dbconnection("spSelectReviews(\"$imageId\")");

    echo '<div class="row">
        <div class="col-12">
            <h5>Reviews</h5>
        </div></div>';

    foreach ($reviews as $review) {
        echo '<div class="row">
            <div class="col-12">';
        echo '<h6 class="mb-1"><a href="singleUser.php?id=' . $review["UID"] . '">' . $review["FirstName"] . ' ' . $review["LastName"] . '</a></h6>';
        echo '</div></div>';

        echo '<div class="row mb-1">
            <div class="col-12">';
        for ($i = 0; $i < $review['Rating']; $i++) {
            echo '<i class="fas fa-star text-primary"></i>';
        }
        while ($i != 5) {
            echo '<i class="far fa-star text-primary"></i>';
            $i++;
        }
        echo '</div></div>';

        echo '<div class="row">
            <div class="col-12">';
        echo '<p>' . $review["Review"] . '</p>';
        echo '</div></div>';
    }
}
