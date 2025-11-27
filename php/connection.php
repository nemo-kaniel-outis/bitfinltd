<?php
$dbhost = "localhost";
$dbname = "u165988863_bfltd_new";
$dbuser = "u165988863_outisK_new";
$dbpass = "..Outisltd1..";

$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

date_default_timezone_set('Europe/Malta');
ini_set("display_errors", '1');
include_once($_SERVER["DOCUMENT_ROOT"]."/views/auto-invest.php");

$site_name = "Bit Finance Limited";
$site_url="https://bitfinltd.net";
$site_url_short="bitfinltd.net";
?>