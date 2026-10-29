# Database Specificatie Tabel – Jamin

**Opdracht:** BE-opdracht 02 – User stories realiseren en testen
**Auteur:** Finnian van Beek
**Datum:** 08-10-2026
**Database:** `jamin` (MySQL / MariaDB, zie `db/create_script_Jamin.sql`)

---

## 1. Systeemvelden

Alle zes tabellen bevatten de volgende systeemvelden:

| Veld            | Datatype   | NULL toegestaan | Standaard                  |
|-----------------|------------|-----------------|----------------------------|
| `IsActief`      | `BIT`      | Nee             | `1`                        |
| `Opmerking`     | `VARCHAR(255)` | Ja          | `NULL`                     |
| `DatumAangemaakt` | `DATETIME(6)` | Nee         | `CURRENT_TIMESTAMP(6)` (= `NOW(6)`) |
| `DatumGewijzigd`  | `DATETIME(6)` | Nee         | `CURRENT_TIMESTAMP(6)` (= `NOW(6)`), met `ON UPDATE CURRENT_TIMESTAMP(6)` |

---

## 2. Stamtabel Leverancier

| Veld              | Datatype        | NULL | Sleutel | Opmerking                    |
|-------------------|-----------------|------|---------|------------------------------|
| `Id`              | `TINYINT UNSIGNED` | Nee | PK      | `AUTO_INCREMENT`             |
| `Naam`            | `VARCHAR(50)`   | Nee  |         |                              |
| `ContactPersoon`  | `VARCHAR(50)`   | Nee  |         |                              |
| `LeverancierNummer` | `VARCHAR(11)` | Nee  |         |                              |
| `Mobiel`          | `VARCHAR(12)`   | Nee  |         |                              |
| `IsActief`        | `BIT`           | Nee  |         | Systeemveld                  |
| `Opmerking`       | `VARCHAR(255)`  | Ja   |         | Systeemveld                  |
| `DatumAangemaakt` | `DATETIME(6)`   | Nee  |         | Systeemveld                  |
| `DatumGewijzigd`  | `DATETIME(6)`   | Nee  |         | Systeemveld                  |

**Records (6 stuks):**

| Id | Naam           | ContactPersoon   | LeverancierNummer | Mobiel       |
|----|----------------|------------------|-------------------|--------------|
| 1  | Venco          | Bert van Linge   | L1029384719       | 06-28493827  |
| 2  | Astra Sweets   | Jasper del Monte | L1029284315       | 06-39398734  |
| 3  | Haribo         | Sven Stalman     | L1029324748       | 06-24383291  |
| 4  | Basset         | Joyce Stelterberg| L1023845773       | 06-48293823  |
| 5  | De Bron        | Remco Veenstra   | L1023857736       | 06-34291234  |
| 6  | **Quality Street** *(nieuw record)* | Johan Nooij | L1029234586 | 06-23458456 |

> Record 6 heeft geen enkele levering, dit record wordt gebruikt in scenario_02 van user story 01.

---

## 3. Stamtabel Allergeen

| Veld            | Datatype      | NULL | Sleutel |
|-----------------|---------------|------|---------|
| `Id`            | `TINYINT UNSIGNED` | Nee | PK   |
| `Naam`          | `VARCHAR(50)` | Nee  |         |
| `Omschrijving`  | `VARCHAR(100)`| Nee  |         |
| + systeemvelden |               |      |         |

**Records (5 stuks):** Gluten, Gelatine, AZO-Kleurstof, Lactose, Soja.

---

## 4. Stamtabel Product

| Veld            | Datatype      | NULL | Sleutel |
|-----------------|---------------|------|---------|
| `Id`            | `TINYINT UNSIGNED` | Nee | PK   |
| `Naam`          | `VARCHAR(50)` | Nee  |         |
| `Barcode`       | `VARCHAR(13)` | Nee  |         |
| + systeemvelden |               |      |         |

**Records (13 stuks)** conform de specificatietabel.
`IsActief = 0` voor **Winegums (Id 10)**: dit product wordt niet meer geproduceerd
(gebruikt in scenario_02 van user story 02).

---

## 5. Koppeltabel Magazijn

| Veld                   | Datatype             | NULL | Sleutel |
|------------------------|----------------------|------|---------|
| `Id`                   | `TINYINT UNSIGNED`   | Nee  | PK      |
| `ProductId`            | `TINYINT UNSIGNED`   | Nee  | **FK → Product(Id)** |
| `VerpakkingsEenheid`   | `DECIMAL(5,2)`       | Nee  | in kg   |
| `AantalAanwezig`       | `SMALLINT UNSIGNED`  | Ja   | mag `NULL` zijn (product 10) |
| + systeemvelden        |                      |      |         |

**Records (13 stuks):** 1 t/m 13, `AantalAanwezig` van product 10 = `NULL`.

---

## 6. Koppeltabel ProductPerAllergeen

| Veld            | Datatype            | NULL | Sleutel |
|-----------------|---------------------|------|---------|
| `Id`            | `TINYINT UNSIGNED`  | Nee  | PK      |
| `ProductId`     | `TINYINT UNSIGNED`  | Nee  | **FK → Product(Id)** |
| `AllergeenId`   | `TINYINT UNSIGNED`  | Nee  | **FK → Allergeen(Id)** |
| + systeemvelden |                     |      |         |

**Records (12 stuks)** conform de specificatietabel.

---

## 7. Koppeltabel ProductPerLeverancier

| Veld                          | Datatype           | NULL | Sleutel |
|-------------------------------|--------------------|------|---------|
| `Id`                          | `TINYINT UNSIGNED` | Nee  | PK      |
| `LeverancierId`               | `TINYINT UNSIGNED` | Nee  | **FK → Leverancier(Id)** |
| `ProductId`                   | `TINYINT UNSIGNED` | Nee  | **FK → Product(Id)** |
| `DatumLevering`               | `DATE`             | Nee  | datum van de zending |
| `Aantal`                      | `SMALLINT UNSIGNED`| Nee  | aantal producteenheden |
| `DatumEerstVolgendeLevering`  | `DATE`             | Ja   | kan `NULL` zijn |
| + systeemvelden               |                    |      |         |

**Records (17 stuks)** conform de specificatietabel (data 2024-11-09 t/m 2024-11-19).

---

## 8. Relaties (ERD)

```
Leverancier 1 ──────< ProductPerLeverancier >────── 1 Product
                                                    │
                                          1 ────────┤
                                                    │
                                          Magazijn 1
                                                    │
Product 1 ──────< ProductPerAllergeen >────── 1 Allergeen
```

| Relatie | Type | FK | PK |
|---------|------|----|----|
| Product → Magazijn | 1 : 1 | `Magazijn.ProductId` | `Product.Id` |
| Leverancier → ProductPerLeverancier | 1 : * | `ProductPerLeverancier.LeverancierId` | `Leverancier.Id` |
| Product → ProductPerLeverancier | 1 : * | `ProductPerLeverancier.ProductId` | `Product.Id` |
| Product → ProductPerAllergeen | 1 : * | `ProductPerAllergeen.ProductId` | `Product.Id` |
| Allergeen → ProductPerAllergeen | 1 : * | `ProductPerAllergeen.AllergeenId` | `Allergeen.Id` |

Alle relaties zijn als `FOREIGN KEY` (`CONSTRAINT FK_...`) in het create-script vastgelegd.

---

## 9. Stored procedures

Alle data die de webapplicatie toont of verandert, loopt via een stored procedure
(aangeroepen vanuit Laravel met **PDO**, `DB::select('CALL ...')`):

| Stored procedure | Doel | Gebruikt door |
|------------------|------|---------------|
| `usp_OverzichtLeveranciers()` | Leveranciers met het aantal verschillende producten, gesorteerd op dat aantal **aflopend** | Wireframe-01 |
| `usp_LeverancierGegevens(pLeverancierId)` | Headergegevens van één leverancier | Wireframe-02 / 03 / 04 |
| `usp_GeleverdeProducten(pLeverancierId)` | Geleverde producten met `AantalAanwezig`, `VerpakkingsEenheid` en `LaatsteLevering`, gesorteerd op `AantalAanwezig` **aflopend** | Wireframe-02 / 03 |
| `usp_OverzichtProducten()` | Alle producten met leverancier en voorraad | Kopje 2 – Toevoegen producten |
| `usp_LeveringToevoegen(pLeverancierId, pProductId, pAantal, pDatumEerstVolgendeLevering)` | Voegt de zending toe: `UPDATE Magazijn` + `INSERT ProductPerLeverancier`. Retourneert `OK` of `PRODUCT_INACTIEF` met de melding | Wireframe-04 |

**Voorbeeld – foutafhandeling (scenario_02 user story 02):**

```sql
CALL usp_LeveringToevoegen(4, 10, 30, CURDATE());
-- Resultaat:  PRODUCT_INACTIEF
-- Melding:    Het product Winegums van de leverancier Basset wordt niet meer geproduceerd
```

---

## 10. Database aanmaken (lokaal)

```sh
# 1. Create-script uitvoeren (maakt database, tabellen, relaties, data en procedures)
mysql -u root < db/create_script_Jamin.sql

# 2. .env instellen op MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jamin
DB_USERNAME=root
DB_PASSWORD=

# 3. Alleen de Laravel-systeemtabellen aanmaken (users, sessions, cache, jobs)
php artisan migrate --path=database/migrations/0001_01_01_000000_create_users_table.php --force
php artisan migrate --path=database/migrations/0001_01_01_000001_create_cache_table.php --force
php artisan migrate --path=database/migrations/0001_01_01_000002_create_jobs_table.php --force
php artisan migrate --path=database/migrations/2026_09_13_190708_add_role_to_users_table.php --force

# 4. Inlogaccounts aanmaken
php artisan db:seed --class=UserSeeder --force

# 5. Starten
php artisan serve
```

**Inloggegevens**

| Rol                  | E-mail              | Wachtwoord |
|----------------------|---------------------|------------|
| Admin                | admin@jamin.nl      | password   |
| Magazijnmedewerker   | medewerker@jamin.nl | password   |
