DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectAllReviews$$

CREATE PROCEDURE spSelectAllReviews()

BEGIN

	SELECT * FROM travelimagerating ORDER BY travelimagerating.datecreated DESC;

END$$
DELIMITER ;
