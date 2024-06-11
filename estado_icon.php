<?php
function isServerOnline($host, $port, $timeout) {
    $connection = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if ($connection) {
        fclose($connection);
        return true;
    }
    return false;
}

$server = "servidor.ultima-alianza.com";
$port = 2593;
$timeout = 2;

$online = isServerOnline($server, $port, $timeout);

$imagePath = $online ? 'assets/img/online_icon.png' : 'assets/img/offline_icon.png';
header('Content-Type: image/png');
readfile($imagePath);
exit();
?>