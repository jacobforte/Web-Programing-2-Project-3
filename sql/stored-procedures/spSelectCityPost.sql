DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectCityPost$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectCityPost`(
    IN citycode varchar(255)
)
BEGIN
    SELECT *
    FROM travelimagedetails
    WHERE (citycode IS NULL OR travelimagedetails.CityCode = citycode);


END$$
DELIMITER ;