-- Step: 01
-- Goal: Create a new database jamin
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- 02            08-10-2026      Finnian van Beek            Systeemvelden, nieuw record
--                                                            Leverancier, stored procedures
-- **********************************************************************************/

-- Check if the database exists
DROP DATABASE IF EXISTS `jamin`;

-- Create a new Database
CREATE DATABASE IF NOT EXISTS `jamin`;

-- Use database jamin
Use `jamin`;


-- ==================================================================================
-- STAMTABELLEN
-- Tabellen met alleen een Primary Key (PK) + extra kolommen
-- ==================================================================================


-- Step: 02
-- Goal: Create a new table Leverancier
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

-- Drop table Leverancier
DROP TABLE IF EXISTS Leverancier;

CREATE TABLE IF NOT EXISTS Leverancier
(
    Id                  TINYINT         UNSIGNED        NOT NULL    AUTO_INCREMENT
   ,Naam                VARCHAR(50)                     NOT NULL
   ,ContactPersoon      VARCHAR(50)                     NOT NULL
   ,LeverancierNummer   VARCHAR(11)                     NOT NULL
   ,Mobiel              VARCHAR(12)                     NOT NULL
   ,IsActief            BIT                             NOT NULL    DEFAULT 1
   ,Opmerking           VARCHAR(255)                        NULL    DEFAULT NULL
   ,DatumAangemaakt     DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6)
   ,DatumGewijzigd      DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)

   ,CONSTRAINT      PK_Leverancier_Id   PRIMARY KEY CLUSTERED(Id)
) ENGINE=InnoDB;


-- Step: 03
-- Goal: Fill table Leverancier with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- 02            08-10-2026      Finnian van Beek            Nieuw record: Quality Street
-- **********************************************************************************/

INSERT INTO Leverancier
(
     Naam
    ,ContactPersoon
    ,LeverancierNummer
    ,Mobiel
    ,IsActief
    ,Opmerking
)
VALUES
     ('Venco', 'Bert van Linge', 'L1029384719', '06-28493827', 1, NULL)
    ,('Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734', 1, NULL)
    ,('Haribo', 'Sven Stalman', 'L1029324748', '06-24383291', 1, NULL)
    ,('Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823', 1, NULL)
    ,('De Bron', 'Remco Veenstra', 'L1023857736', '06-34291234', 1, NULL)
    ,('Quality Street', 'Johan Nooij', 'L1029234586', '06-23458456', 1, NULL);


-- Step: 04
-- Goal: Create a new table Allergeen
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

-- Drop table Allergeen
DROP TABLE IF EXISTS Allergeen;

CREATE TABLE IF NOT EXISTS Allergeen
(
    Id                  TINYINT         UNSIGNED        NOT NULL    AUTO_INCREMENT
   ,Naam                VARCHAR(50)                     NOT NULL
   ,Omschrijving        VARCHAR(100)                    NOT NULL
   ,IsActief            BIT                             NOT NULL    DEFAULT 1
   ,Opmerking           VARCHAR(255)                        NULL    DEFAULT NULL
   ,DatumAangemaakt     DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6)
   ,DatumGewijzigd      DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)

   ,CONSTRAINT      PK_Allergeen_Id   PRIMARY KEY CLUSTERED(Id)
) ENGINE=InnoDB;


-- Step: 05
-- Goal: Fill table Allergeen with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

INSERT INTO Allergeen
(
     Naam
    ,Omschrijving
    ,IsActief
    ,Opmerking
)
VALUES
     ('Gluten', 'Dit product bevat gluten', 1, NULL)
    ,('Gelatine', 'Dit product bevat gelatine', 1, NULL)
    ,('AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen', 1, NULL)
    ,('Lactose', 'Dit product bevat lactose', 1, NULL)
    ,('Soja', 'Dit product bevat soja', 1, NULL);


-- Step: 06
-- Goal: Create a new table Product
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

-- Drop table Product
DROP TABLE IF EXISTS Product;

CREATE TABLE IF NOT EXISTS Product
(
    Id                  TINYINT         UNSIGNED        NOT NULL    AUTO_INCREMENT
   ,Naam                VARCHAR(50)                     NOT NULL
   ,Barcode             VARCHAR(13)                     NOT NULL
   ,IsActief            BIT                             NOT NULL    DEFAULT 1
   ,Opmerking           VARCHAR(255)                        NULL    DEFAULT NULL
   ,DatumAangemaakt     DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6)
   ,DatumGewijzigd      DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)

   ,CONSTRAINT      PK_Product_Id   PRIMARY KEY CLUSTERED(Id)
) ENGINE=InnoDB;


-- Step: 07
-- Goal: Fill table Product with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- 02            08-10-2026      Finnian van Beek            Winegums wordt niet meer gemaakt (IsActief = 0)
-- **********************************************************************************/

INSERT INTO Product
(
     Naam
    ,Barcode
    ,IsActief
    ,Opmerking
)
VALUES
     ('Mintnopjes', '8719587231278', 1, NULL)
    ,('Schoolkrijt', '8719587326713', 1, NULL)
    ,('Honingdrop', '8719587327836', 1, NULL)
    ,('Zure Beren', '8719587321441', 1, NULL)
    ,('Cola Flesjes', '8719587321237', 1, NULL)
    ,('Turtles', '8719587322245', 1, NULL)
    ,('Witte Muizen', '8719587328256', 1, NULL)
    ,('Reuzen Slangen', '8719587325641', 1, NULL)
    ,('Zoute Rijen', '8719587322739', 1, NULL)
    ,('Winegums', '8719587327527', 0, 'Dit product wordt niet meer geproduceerd')
    ,('Drop Munten', '8719587322345', 1, NULL)
    ,('Kruis Drop', '8719587322265', 1, NULL)
    ,('Zoute Ruitjes', '8719587323256', 1, NULL);


-- ==================================================================================
-- KOPPELTABELLEN
-- Tabellen met een PK + één of meerdere Foreign Keys (FK) + extra kolommen
-- ==================================================================================


-- Step: 08
-- Goal: Create a new table Magazijn
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

-- Drop table Magazijn
DROP TABLE IF EXISTS Magazijn;

CREATE TABLE IF NOT EXISTS Magazijn
(
    Id                  TINYINT         UNSIGNED        NOT NULL    AUTO_INCREMENT
   ,ProductId           TINYINT         UNSIGNED        NOT NULL
   ,VerpakkingsEenheid  DECIMAL(5,2)                    NOT NULL
   ,AantalAanwezig      SMALLINT        UNSIGNED            NULL    DEFAULT NULL
   ,IsActief            BIT                             NOT NULL    DEFAULT 1
   ,Opmerking           VARCHAR(255)                        NULL    DEFAULT NULL
   ,DatumAangemaakt     DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6)
   ,DatumGewijzigd      DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)

   ,CONSTRAINT      PK_Magazijn_Id   PRIMARY KEY CLUSTERED(Id)
   ,CONSTRAINT      FK_Magazijn_ProductId_Product_Id  FOREIGN KEY (ProductId) REFERENCES Product(Id)
) ENGINE=InnoDB;


-- Step: 09
-- Goal: Fill table Magazijn with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

INSERT INTO Magazijn
(
     ProductId
    ,VerpakkingsEenheid
    ,AantalAanwezig
    ,IsActief
    ,Opmerking
)
VALUES
     (1, 5.00, 453, 1, NULL)
    ,(2, 2.50, 400, 1, NULL)
    ,(3, 5.00, 1, 1, NULL)
    ,(4, 1.00, 800, 1, NULL)
    ,(5, 3.00, 234, 1, NULL)
    ,(6, 2.00, 345, 1, NULL)
    ,(7, 1.00, 795, 1, NULL)
    ,(8, 10.00, 233, 1, NULL)
    ,(9, 2.50, 123, 1, NULL)
    ,(10, 3.00, NULL, 1, NULL)
    ,(11, 2.00, 367, 1, NULL)
    ,(12, 1.00, 467, 1, NULL)
    ,(13, 5.00, 20, 1, NULL);


-- Step: 10
-- Goal: Create a new table ProductPerAllergeen
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

-- Drop table ProductPerAllergeen
DROP TABLE IF EXISTS ProductPerAllergeen;

CREATE TABLE IF NOT EXISTS ProductPerAllergeen
(
    Id                  TINYINT         UNSIGNED        NOT NULL    AUTO_INCREMENT
   ,ProductId           TINYINT         UNSIGNED        NOT NULL
   ,AllergeenId         TINYINT         UNSIGNED        NOT NULL
   ,IsActief            BIT                             NOT NULL    DEFAULT 1
   ,Opmerking           VARCHAR(255)                        NULL    DEFAULT NULL
   ,DatumAangemaakt     DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6)
   ,DatumGewijzigd      DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)

   ,CONSTRAINT      PK_ProductPerAllergeen_Id   PRIMARY KEY CLUSTERED(Id)
   ,CONSTRAINT      FK_ProductPerAllergeen_ProductId_Product_Id  FOREIGN KEY (ProductId) REFERENCES Product(Id)
   ,CONSTRAINT      FK_ProductPerAllergeen_AllergeenId_Allergeen_Id  FOREIGN KEY (AllergeenId) REFERENCES Allergeen(Id)
) ENGINE=InnoDB;


-- Step: 11
-- Goal: Fill table ProductPerAllergeen with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

INSERT INTO ProductPerAllergeen
(
     ProductId
    ,AllergeenId
    ,IsActief
    ,Opmerking
)
VALUES
     (1, 2, 1, NULL)
    ,(1, 1, 1, NULL)
    ,(1, 3, 1, NULL)
    ,(3, 4, 1, NULL)
    ,(6, 5, 1, NULL)
    ,(9, 2, 1, NULL)
    ,(9, 5, 1, NULL)
    ,(10, 2, 1, NULL)
    ,(12, 4, 1, NULL)
    ,(13, 1, 1, NULL)
    ,(13, 4, 1, NULL)
    ,(13, 5, 1, NULL);


-- Step: 12
-- Goal: Create a new table ProductPerLeverancier
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- **********************************************************************************/

-- Drop table ProductPerLeverancier
DROP TABLE IF EXISTS ProductPerLeverancier;

CREATE TABLE IF NOT EXISTS ProductPerLeverancier
(
    Id                          TINYINT         UNSIGNED        NOT NULL    AUTO_INCREMENT
   ,LeverancierId               TINYINT         UNSIGNED        NOT NULL
   ,ProductId                   TINYINT         UNSIGNED        NOT NULL
   ,DatumLevering               DATE                            NOT NULL
   ,Aantal                      SMALLINT        UNSIGNED        NOT NULL
   ,DatumEerstVolgendeLevering  DATE                                NULL    DEFAULT NULL
   ,IsActief                    BIT                             NOT NULL    DEFAULT 1
   ,Opmerking                   VARCHAR(255)                        NULL    DEFAULT NULL
   ,DatumAangemaakt             DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6)
   ,DatumGewijzigd              DATETIME(6)                     NOT NULL    DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)

   ,CONSTRAINT      PK_ProductPerLeverancier_Id   PRIMARY KEY CLUSTERED(Id)
   ,CONSTRAINT      FK_ProductPerLeverancier_LeverancierId_Leverancier_Id  FOREIGN KEY (LeverancierId) REFERENCES Leverancier(Id)
   ,CONSTRAINT      FK_ProductPerLeverancier_ProductId_Product_Id  FOREIGN KEY (ProductId) REFERENCES Product(Id)
) ENGINE=InnoDB;


-- Step: 13
-- Goal: Fill table ProductPerLeverancier with data
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            13-09-2026      Finnian van Beek            New
-- 02            08-10-2026      Finnian van Beek            Data conform specificatietabel
-- **********************************************************************************/

INSERT INTO ProductPerLeverancier
(
     LeverancierId
    ,ProductId
    ,DatumLevering
    ,Aantal
    ,DatumEerstVolgendeLevering
    ,IsActief
    ,Opmerking
)
VALUES
     (1, 1, '2024-11-09', 23, '2024-11-16', 1, NULL)
    ,(1, 1, '2024-11-18', 21, '2024-11-25', 1, NULL)
    ,(1, 2, '2024-11-09', 12, '2024-11-16', 1, NULL)
    ,(1, 3, '2024-11-10', 11, '2024-11-17', 1, NULL)
    ,(2, 4, '2024-11-14', 16, '2024-11-21', 1, NULL)
    ,(2, 4, '2024-11-21', 23, '2024-11-28', 1, NULL)
    ,(2, 5, '2024-11-14', 45, '2024-11-21', 1, NULL)
    ,(2, 6, '2024-11-14', 30, '2024-11-21', 1, NULL)
    ,(3, 7, '2024-11-12', 12, '2024-11-19', 1, NULL)
    ,(3, 7, '2024-11-19', 23, '2024-11-26', 1, NULL)
    ,(3, 8, '2024-11-10', 12, '2024-11-17', 1, NULL)
    ,(3, 9, '2024-11-11', 1, '2024-11-18', 1, NULL)
    ,(4, 10, '2024-11-16', 24, '2024-11-30', 1, NULL)
    ,(5, 11, '2024-11-10', 47, '2024-11-17', 1, NULL)
    ,(5, 11, '2024-11-19', 60, '2024-11-26', 1, NULL)
    ,(5, 12, '2024-11-11', 45, NULL, 1, NULL)
    ,(5, 13, '2024-11-12', 23, NULL, 1, NULL);


-- ==================================================================================
-- STORED PROCEDURES
-- Alle queries die de webapplicatie gebruikt, staan in een stored procedure
-- ==================================================================================


-- Step: 14
-- Goal: Stored procedure: overzicht van alle leveranciers met het aantal
--       verschillende producten dat zij aan Jamin leveren (aflopend)
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            08-10-2026      Finnian van Beek            New
-- **********************************************************************************/

DROP PROCEDURE IF EXISTS usp_OverzichtLeveranciers;

DELIMITER //

CREATE PROCEDURE usp_OverzichtLeveranciers()
BEGIN
    SELECT
         L.Id
        ,L.Naam
        ,L.ContactPersoon
        ,L.LeverancierNummer
        ,L.Mobiel
        ,CAST(L.IsActief AS UNSIGNED)                              AS IsActief
        ,COUNT(DISTINCT PPL.ProductId)                             AS AantalVerschillendeProducten
    FROM Leverancier L
    LEFT JOIN ProductPerLeverancier PPL
           ON PPL.LeverancierId = L.Id
          AND PPL.IsActief = 1
    WHERE L.IsActief = 1
    GROUP BY L.Id, L.Naam, L.ContactPersoon, L.LeverancierNummer, L.Mobiel, L.IsActief
    ORDER BY AantalVerschillendeProducten DESC, L.Naam ASC;
END //

DELIMITER ;


-- Step: 15
-- Goal: Stored procedure: gegevens van een leverancier (header van het
--       detailscherm Geleverde producten)
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            08-10-2026      Finnian van Beek            New
-- **********************************************************************************/

DROP PROCEDURE IF EXISTS usp_LeverancierGegevens;

DELIMITER //

CREATE PROCEDURE usp_LeverancierGegevens(IN pLeverancierId TINYINT)
BEGIN
    SELECT
         L.Id
        ,L.Naam
        ,L.ContactPersoon
        ,L.LeverancierNummer
        ,L.Mobiel
        ,CAST(L.IsActief AS UNSIGNED)                              AS IsActief
    FROM Leverancier L
    WHERE L.Id = pLeverancierId;
END //

DELIMITER ;


-- Step: 16
-- Goal: Stored procedure: geleverde producten van een leverancier met het aantal
--       dat in het magazijn aanwezig is, de verpakkingseenheid en de datum van de
--       laatst geleverde zending (gesorteerd op AantalAanwezig aflopend)
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            08-10-2026      Finnian van Beek            New
-- **********************************************************************************/

DROP PROCEDURE IF EXISTS usp_GeleverdeProducten;

DELIMITER //

CREATE PROCEDURE usp_GeleverdeProducten(IN pLeverancierId TINYINT)
BEGIN
    SELECT
         P.Id                                                       AS ProductId
        ,P.Naam                                                     AS ProductNaam
        ,P.Barcode
        ,M.AantalAanwezig
        ,M.VerpakkingsEenheid
        ,MAX(PPL.DatumLevering)                                     AS LaatsteLevering
        ,CAST(P.IsActief AS UNSIGNED)                               AS ProductIsActief
    FROM ProductPerLeverancier PPL
    INNER JOIN Product P
            ON P.Id = PPL.ProductId
    INNER JOIN Magazijn M
            ON M.ProductId = P.Id
    WHERE PPL.LeverancierId = pLeverancierId
      AND PPL.IsActief = 1
    GROUP BY P.Id, P.Naam, P.Barcode, M.AantalAanwezig, M.VerpakkingsEenheid, P.IsActief
    ORDER BY M.AantalAanwezig DESC, P.Naam ASC;
END //

DELIMITER ;


-- Step: 17
-- Goal: Stored procedure: overzicht van alle producten met de leverancier die het
--       product levert (instappunt scherm Toevoegen producten)
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            08-10-2026      Finnian van Beek            New
-- **********************************************************************************/

DROP PROCEDURE IF EXISTS usp_OverzichtProducten;

DELIMITER //

CREATE PROCEDURE usp_OverzichtProducten()
BEGIN
    SELECT
         P.Id                                                       AS ProductId
        ,P.Naam                                                     AS ProductNaam
        ,P.Barcode
        ,CAST(P.IsActief AS UNSIGNED)                               AS ProductIsActief
        ,M.AantalAanwezig
        ,M.VerpakkingsEenheid
        ,COALESCE(MIN(L.Naam), '-')                                 AS LeverancierNaam
        ,COALESCE(MIN(L.Id), 0)                                     AS LeverancierId
        ,MAX(PPL.DatumLevering)                                     AS LaatsteLevering
    FROM Product P
    INNER JOIN Magazijn M
            ON M.ProductId = P.Id
    LEFT JOIN ProductPerLeverancier PPL
           ON PPL.ProductId = P.Id
          AND PPL.IsActief = 1
    LEFT JOIN Leverancier L
           ON L.Id = PPL.LeverancierId
    GROUP BY P.Id, P.Naam, P.Barcode, P.IsActief, M.AantalAanwezig, M.VerpakkingsEenheid
    ORDER BY P.Naam ASC;
END //

DELIMITER ;


-- Step: 18
-- Goal: Stored procedure: nieuwe zending van een product toevoegen aan het aantal
--       in het magazijn. Retourneert Resultaat = OK of PRODUCT_INACTIEF met de
--       melding die in de webapplicatie getoond wordt.
-- **********************************************************************************
-- Version       Date:           Author:                     Description:
-- *******       **********      ****************            ******************
-- 01            08-10-2026      Finnian van Beek            New
-- **********************************************************************************/

DROP PROCEDURE IF EXISTS usp_LeveringToevoegen;

DELIMITER //

CREATE PROCEDURE usp_LeveringToevoegen
(
     IN pLeverancierId                 TINYINT
    ,IN pProductId                     TINYINT
    ,IN pAantal                        SMALLINT
    ,IN pDatumEerstVolgendeLevering    DATE
)
BEGIN
    DECLARE vProductNaam       VARCHAR(50) DEFAULT NULL;
    DECLARE vLeverancierNaam   VARCHAR(50) DEFAULT NULL;
    DECLARE vProductIsActief   TINYINT     DEFAULT 1;

    SELECT
         P.Naam
        ,CAST(P.IsActief AS UNSIGNED)
    INTO
         vProductNaam
        ,vProductIsActief
    FROM Product P
    WHERE P.Id = pProductId;

    SELECT L.Naam
    INTO vLeverancierNaam
    FROM Leverancier L
    WHERE L.Id = pLeverancierId;

    IF vProductNaam IS NULL THEN
        SELECT
            'PRODUCT_NIET_GEVONDEN'                             AS Resultaat
           ,'Dit product komt niet voor in de database'         AS Melding;

    ELSEIF vProductIsActief = 0 THEN
        SELECT
            'PRODUCT_INACTIEF'                                  AS Resultaat
           ,CONCAT('Het product '
                  ,vProductNaam
                  ,' van de leverancier '
                  ,IFNULL(vLeverancierNaam, 'onbekend')
                  ,' wordt niet meer geproduceerd')             AS Melding;

    ELSE
        UPDATE Magazijn
        SET AantalAanwezig  = IFNULL(AantalAanwezig, 0) + pAantal
           ,DatumGewijzigd  = NOW(6)
        WHERE ProductId = pProductId;

        INSERT INTO ProductPerLeverancier
        (
             LeverancierId
            ,ProductId
            ,DatumLevering
            ,Aantal
            ,DatumEerstVolgendeLevering
            ,IsActief
            ,Opmerking
            ,DatumAangemaakt
            ,DatumGewijzigd
        )
        VALUES
        (
             pLeverancierId
            ,pProductId
            ,CURDATE()
            ,pAantal
            ,pDatumEerstVolgendeLevering
            ,1
            ,NULL
            ,NOW(6)
            ,NOW(6)
        );

        SELECT
            'OK'                                                AS Resultaat
           ,'De nieuwe zending is toegevoegd aan de voorraad'    AS Melding;
    END IF;
END //

DELIMITER ;
