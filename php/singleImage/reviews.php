<?php

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        // server side validation?
        addNewReview();
        break;
    case 'GET':
        // server side validation?
        getReviews($_GET['id']);
        break;
    case 'DELETE':
        // delete reviews for
}

function addNewReview() {
    require_once("../dbconnection.function.php");
    dbconnection("spNewReview(" . $_POST['UID'] . ", "
        . $_POST['imageId'] . ", " . $_POST['rating'] . ", \"" . $_POST['review'] . "\")");
}

function getReviews($imageID) {
    require_once("../dbconnection.function.php");
    $result['status'] = 1;
    $result['data'] = dbconnection("spSelectReviews(\"$imageID\")");
    echo json_encode($result);
}

function deleteReview($reviewID) {

}