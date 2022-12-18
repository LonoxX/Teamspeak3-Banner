<?php
// Verbindung zur Datenbank herstellen
$dsn = 'mysql:host=Placeholder; dbname=Placeholder';
$user = 'Placeholder';
$password = 'Placeholder';
try {
  $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

// Zufällige Nachricht aus der Datenbank auswählen
$sql = "SELECT * FROM pn_teamspeak ORDER BY RAND() LIMIT 1";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$infomsg = $row['msg'];

// Verbindung zum Teamspeak-Server herstellen
require_once 'libraries/TeamSpeak3/TeamSpeak3.php';
$serverquery_username = "Placeholder";
$serverquery_pass = "Placeholder";
$serverip = "Placeholder";
$serverquery_port = "10011";
$serverport = "9987";


try {
  $ts3_VirtualServer = TeamSpeak3::factory("serverquery://$serverquery_username:$serverquery_pass@$serverip:$serverquery_port/?server_port=$serverport");
  $nutzer = $ts3_VirtualServer->virtualserver_clientsonline - 1;
  $snames = $ts3_VirtualServer->virtualserver_name;
  $chn = "Channel: " . $ts3_VirtualServer->virtualserver_channelsonline;
  $blabla = "User: " . $nutzer . "/" . $ts3_VirtualServer->virtualserver_maxclients;
  $uptime = $ts3_VirtualServer->virtualserver_uptime;
  $init = $uptime;
  $days = floor($init / 86400);
  $seconds = $init % 60;
  $uptimeoutput = "Uptime: " . $days . " Tagen";
  $currentDateTime = date('d.m.Y H:i');
} catch (Exception $e) {
  $error = "Offline";
}
// Bilderstellung
$font = "font/Ubuntu-B.ttf";
$image = imagecreatefrompng("images/banner.png");
$blau = imagecolorallocate($image, 47, 132, 189);
$weiss = imagecolorallocate($image, 255, 255, 255);
imagettftext($image, 30, 0, 5, 50, $weiss, $font, $snames);
imagettftext($image, 18, 0, 5, 100, $blau, $font, $infomsg);

imagettftext($image, 15, 0, 10, 170, $weiss, $font, $uptimeoutput);
imagettftext($image, 25, 0, 10, 210, $weiss, $font, $currentDateTime);

imagettftext($image, 20, 0, 450, 180, $weiss, $font, $blabla);
imagettftext($image, 20, 0, 450, 210, $weiss, $font, $chn);

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);
