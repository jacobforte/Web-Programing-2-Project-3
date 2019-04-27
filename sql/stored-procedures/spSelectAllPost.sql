DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectAllPost$$

CREATE PROCEDURE spSelectAllPost()

BEGIN

    SELECT * FROM travelpost ORDER BY travelpost.PostTime DESC;

END$$
DELIMITER ;