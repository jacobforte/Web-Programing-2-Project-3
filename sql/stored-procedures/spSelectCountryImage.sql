DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectCountryImage$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectCountryImage`(IN `id` VARCHAR(255))
BEGIN
    SELECT *
    FROM travelimagedetails
    WHERE (id IS NULL OR travelimagedetails.CountryCodeISO = id);


END$$
DELIMITER ;