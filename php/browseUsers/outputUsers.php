<?php
require_once("php/dbconnection.function.php");

function outputUsers() {
    $data = dbconnection("spSelectUser(NULL)");

    echo '<div class="row">';
    foreach ($data as $user) {
        $sqlDate = strtotime($user["DateJoined"]);
        $formattedDate = date("M d, Y", $sqlDate);
        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <h5><a href="singleUser.php?id=' . $user['UID'] . '">' . $user['FirstName'] . ' ' . $user['LastName'] . '</a></h5>
                <p class="small mb-1">Joined ' . $formattedDate . '</p>
              </div>';
    }
    echo '</div>';

}