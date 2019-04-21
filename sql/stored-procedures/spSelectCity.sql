DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectCity$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectCity`(IN `citycode` INT(255))
BEGIN
    SELECT *
    FROM geocities
    WHERE (citycode IS NULL OR geocities.GeoNameId = citycode);


END$$
DELIMITER ;