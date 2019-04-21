<?php
class SearchResults {
    private $isPost;
    private $searchResultsArray;

    function __construct($isPost, $title, $city, $country) {
        $searchResultsArray = array();
        $this->isPost = $isPost;
        require_once("php/dbconnection.function.php");
        if ($isPost) {
            require_once("php/searchResults/singlePostResult.class.php");
            $result = dbconnection("spSelectPostsOnSearch(\"{$title}\")");
            foreach ($result as $row) {
                $this->searchResultsArray[] = new SinglePostResult($row["PostTime"], $row["PostID"], $row["Title"], $row["Message"]);
            }
            usort($this->searchResultsArray, array("SinglePostResult", "cmp_name"));
        }
        else {
            require_once("php/searchResults/singleImageResult.class.php");
            $result = dbconnection("spSelectImagesOnSearch(\"{$title}\", \"{$country}\", \"{$city}\")");
            foreach ($result as $row) {
                $this->searchResultsArray[] = new SingleImageResult($row["ImageID"], $row["Title"], $row["Path"]);
            }
            usort($this->searchResultsArray, array("SingleImageResult", "cmp_name"));
        }
    }

    function print() {
        if (empty($this->searchResultsArray)) {
            echo "<div class='col'>
                    <p>No results for the selected criteria</p>
                </div>";
            return;
        }
        foreach($this->searchResultsArray as $row) {
            $row->print();
        }
    }
}
?>