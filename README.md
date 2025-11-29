# Task & Time Tracker (PHP + MySQL)

Een simpele maar realistische webapplicatie om gewerkte uren, reiskosten en parkeerkosten per medewerker en per klant te registreren – inclusief rapportage en winstberekening per opdrachtgever.

## Functionaliteiten

- **Authenticatie**
  - Inloggen met e-mail en wachtwoord
  - Rollen: `admin` en `medewerker`

- **Klantenbeheer**
  - Klanten aanmaken, bewerken en verwijderen
  - Contactpersoon, telefoon, e-mail en adres
  - **Factuurtarief per klant** (uurtarief richting opdrachtgever)

- **Medewerkersbeheer**
  - Medewerkers (users) met uurtarief en rol
  - Activeren / deactiveren van accounts

- **Werkregistratie (work sessions)**
  - Koppeling medewerker + klant + datum
  - Aantal gewerkte uren
  - Reiskosten en parkeerkosten
  - Status van de registratie (bijv. bevestigd)

- **Rapportage**
  - Overzicht per klant in een gekozen periode
  - Totaal uren, reiskosten, parkeerkosten en loonkosten
  - **Omzet per klant** (uren × factuurtarief klant)
  - **Winst per klant** (omzet – kosten)

## Technologie

- PHP (zonder framework, eigen lichte MVC-structuur)
- MySQL / MariaDB
- phpMyAdmin (voor databasebeheer)
- XAMPP (ontwikkelomgeving)

## Structuur

```text
app/
  config/
    config.example.php   # voorbeeld van database-configuratie
  core/
    Controller.php       # basiscontroller
    Database.php         # singleton database-verbinding (PDO)
  controllers/
    HomeController.php
    AuthController.php
    ClientController.php
    UserController.php
    WorkSessionController.php
    ReportController.php
  models/
    User.php
    Client.php
    WorkSession.php
  views/
    layout.php
    home/
    clients/
    users/
    work_sessions/
    reports/

public/
  index.php              # front controller (entry point)
  make_admin.php         # script om een admin-gebruiker aan te maken
