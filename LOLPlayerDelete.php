<html><head><meta charset="utf-8"> 
<title> ..:: Team Builder :: Delete LOL Player ::..</title>
</head>
<body>
<?php
include ("include.php");
$connection = new Connection("localhost", "root", "", "esports");
$connection->connect();

$player = new LOLPlayer();
$nick = $_POST['nick'];
$result = $player->deleteByNick($connection, $nick);

if(!$result) {
	echo 'Unable to Delete the Player '.$nick;
} else {
	echo 'Player deleted Sucesfully';
	header("Location: LOLPlayersList.php");
}
$connection->close();
die();
?>
</body></html>