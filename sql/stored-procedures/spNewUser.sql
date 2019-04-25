DELIMITER $$
DROP PROCEDURE IF EXISTS spNewUser$$

CREATE PROCEDURE spNewUser
(
    IN email varchar(255),
    IN password varchar(255)
)
BEGIN
    INSERT INTO traveluser (UID, UserName, Pass, State, DateJoined, DateLastModified)
    VALUES (NULL, email, password, 1, CURRENT_DATE(), CURRENT_DATE());
END$$
DELIMITER ;