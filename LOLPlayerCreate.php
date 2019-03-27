<html><head><meta charset="utf-8"> 
<title> ..:: Team Builder :: Create LOL Player ::..</title>
</head>
<body>
<?php
include ("include.php");
$connection = new Connection("localhost", "root", "", "esports");
$connection->connect();

$player = new LOLPlayer();
$player->setName($_POST['name']);
$player->setNick($_POST['nick']);
$player->setPrimaryRole($_POST['primaryRole']);
$player->setSecundaryRole($_POST['primaryRole']);

$result = $player->create($connection, $player);

if(!$result) {
	echo 'Unable to add new Entry';
} else {
	echo 'Player added sucesfully';
	header("Location: LOLPlayersList.php");
}
$connection->close();
die();
?>
</body></html>