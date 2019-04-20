<?php

define('_PATH', $_SERVER["DOCUMENT_ROOT"] . "/Web-Programing-2-Project-3");

require( _PATH . "/php/" . "dbconnection.function.php");

function outputTopImages() {
    $data = dbconnection("spSelectTopImages()");

    for ($i = 0; $i < 12; $i++) {
        echo '<div class="col-6 col-sm-4 mb-4">
            <a href="singleImage.php?id=' . $data[$i]['ImageID'] . '">
                <img src="./travel-images/square-medium/' . $data[$i]['Path'] . '" class="img-thumbnail">
            </a>
        </div>';
    }

}

function outputNewImages() {
    $data = dbconnection("spSelectNewImages()");

    for ($i = 0; $i < 12; $i++) {
        echo '<div class="col-6 col-sm-4 mb-4">
            <a href="singleImage.php?id=' . $data[$i]['ImageID'] . '">
                <img src="./travel-images/square-medium/' . $data[$i]['Path'] . '" class="img-thumbnail">
            </a>
        </div>';
    }

}