# Anleitung zur Installation

Dieses Skript zeigt Informationen über deinen Teamspeak-Server in einem Bild an. Es wird empfohlen, die Datei auf einem Webserver mit PHP-Unterstützung auszuführen.

## Vorraussetzungen

- PHP 8.0 oder höher
- MySQL-Datenbank
- Zugriff auf den Teamspeak-Server (Serverquery)

## Schritt 1: Abhängigkeiten installieren

Lade das [TeamSpeak PHP Framework](https://github.com/planetteamspeak/ts3phpframework) herunter und und lade dies auf auf den Webserver.

## Schritt 2: Datenbank einrichten

Führe folgenden SQL-Befehl aus,um die benötigte Tabelle zu erstellen:

```sql
CREATE TABLE pn_teamspeak (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  msg VARCHAR(255) NOT NULL
);
```

Optional können auch bereits Demo-Einträge hinzugefügt werden:

```sql
INSERT INTO pn_teamspeak (msg) VALUES ('Willkommen auf unserem Teamspeak-Server!');
INSERT INTO pn_teamspeak (msg) VALUES ('Schau dich gerne um und finde einen passenden Channel für dich.');
INSERT INTO pn_teamspeak (msg) VALUES ('Hast du Fragen oder Probleme? Unser Support-Team hilft dir gerne weiter.');
INSERT INTO pn_teamspeak (msg) VALUES ('Unsere Serverregeln findest du im Channel "Informationen". Bitte halte dich daran.');
INSERT INTO pn_teamspeak (msg) VALUES ('Wir freuen uns, wenn du uns auf unserem Discord-Server besuchst: https://discord.gg/z8ScRvf');
```

Die Nachrichten können jederzeit selbst angepasst werden.

## Schritt 3: Konfiguration anpassen

Öffne die Datei `index.php` und passe folgende Werte an:

- `$dsn`, `$user`, `$password`: MySQL-Verbindungsdaten (Hinweis: Die Platzhalter müssen durch die tatsächlichen Werte ersetzt werden)
- `$serverquery_username`, `$serverquery_pass`: Serverquery-Anmeldedaten für den Teamspeak-Server
- `$serverip`, `$serverquery_port`, `$serverport`: IP-Adresse und Ports des Teamspeak-Servers

## Schritt 4: Bild anzeigen lassen

Laden das Bild über den folgenden Link auf: `http://IHR_SERVER/pfad/zu/index.php`

# Support

#### © 2019 - 2023 Panda-Network

> Webseite: [Panda-Network.de](https://panda-network.de) \
> Support [Discord-Server](https://discord.gg/z8ScRvf)
