DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectPosts$$

CREATE PROCEDURE spSelectPosts
(
    IN uid INT(11)
)

BEGIN
    SELECT *
    FROM travelpost
    WHERE travelpost.UID = uid;

END$$
DELIMITER ;