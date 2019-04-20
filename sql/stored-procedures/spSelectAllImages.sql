DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectAllImages$$

CREATE PROCEDURE spSelectAllImages()

BEGIN
    SELECT travelImage.ImageID,
        travelImage.Path,
        travelimagedetails.Title,
        geocountries.CountryName,
        geocontinents.ContinentName
    FROM travelImage
    LEFT OUTER JOIN travelimagedetails ON travelImage.ImageID = travelimagedetails.ImageID
    LEFT OUTER JOIN geocountries ON travelimagedetails.CountryCodeISO = geocountries.ISO
    LEFT OUTER JOIN geocontinents ON geocountries.Continent = geocontinents.ContinentCode;
END$$
DELIMITER ;