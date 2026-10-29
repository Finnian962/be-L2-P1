#!/usr/bin/env bash
#
# Maakt de database `jamin` aan volgens db/create_script_Jamin.sql,
# waarna de Laravel-systeemtabellen en de inlogaccounts worden toegevoegd.
#
# Gebruik:  bash db/setup_database.sh
#
set -e

PROJECTMAP="$(cd "$(dirname "$0")/.." && pwd)"

# MySQL-client zoeken: PATH, daarna XAMPP, MAMP en Homebrew
if [ -z "$MYSQL" ]; then
    MYSQL="$(command -v mysql || true)"
    for KANDIDAAT in \
        /Applications/XAMPP/xamppfiles/bin/mysql \
        /Applications/MAMP/Library/bin/mysql/mysql \
        /opt/homebrew/bin/mysql \
        /usr/local/bin/mysql
    do
        if [ -z "$MYSQL" ] && [ -x "$KANDIDAAT" ]; then
            MYSQL="$KANDIDAAT"
        fi
    done
fi

if [ -z "$MYSQL" ]; then
    echo "Fout: geen mysql-client gevonden. Voer het script opnieuw uit met:"
    echo "  MYSQL=/pad/naar/mysql bash db/setup_database.sh"
    exit 1
fi

echo "==> MySQL: $MYSQL"

echo "==> 1/4 Create-script uitvoeren (tabellen, relaties, data, stored procedures)"
"$MYSQL" -u root < "$PROJECTMAP/db/create_script_Jamin.sql"

cd "$PROJECTMAP"

echo "==> 2/4 Laravel-systeemtabellen (users, sessions, cache, jobs, Role)"
php artisan migrate --path=database/migrations/0001_01_01_000000_create_users_table.php --force
php artisan migrate --path=database/migrations/0001_01_01_000001_create_cache_table.php --force
php artisan migrate --path=database/migrations/0001_01_01_000002_create_jobs_table.php --force
php artisan migrate --path=database/migrations/2026_09_13_190708_add_role_to_users_table.php --force

echo "==> 3/4 De Jamin-migraties registreren (de tabellen komen uit het create-script)"
"$MYSQL" -u root jamin <<'SQL'
INSERT IGNORE INTO migrations (migration, batch) VALUES
('2026_09_13_190709_create_leverancier_table', 1),
('2026_09_13_190710_create_allergeen_table', 1),
('2026_09_13_190711_create_product_table', 1),
('2026_09_13_190712_create_magazijn_table', 1),
('2026_09_13_190713_create_product_per_allergeen_table', 1),
('2026_09_13_190714_create_product_per_leverancier_table', 1);
SQL

echo "==> 4/4 Inlogaccounts aanmaken"
php artisan db:seed --class=UserSeeder --force

echo ""
echo "Klaar. Start de applicatie met:  php artisan serve"
echo "Inloggen als magazijnmedewerker: medewerker@jamin.nl / password"
