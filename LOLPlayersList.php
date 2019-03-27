<html><head><meta charset="utf-8"> 
<title> ..:: Team Builder :: LOL Player List ::..</title>
</head>
<body>
<?php
function showPlayers() {
	include ("include.php");
	$connection = new Connection("localhost", "root", "", "esports");
	$connection->connect();
	$PlayerLol = new LOLPlayer();
	$playerList = $PlayerLol->getAllPlayers($connection);
	if ($playerList !=NULL) {
		foreach ($playerList as $player) {
			echo "<tr><td>".$player->getName()."</td>";
			echo "<td>".$player->getNick()."</td>";
			echo "<td>".LOLUtilities::showRole($player->getPrimaryRole())."</td>";
			echo "<td>".LOLUtilities::showRole($player->getSecundaryRole())."</td></tr>";
		}
	}else{
		echo "<br/>There is no Player Data!!<br/>";
	}
	$connection->close();
}
?>
<center> <table border=1 align='center'>
<tr><td>Name</td><td>Nick</td><td>Primary Role</td><td>Secundary Role</td></tr>
<?php showPlayers(); ?>
</table></center>
</body></html>