<html><head><meta charset="utf-8"> 
<title> ..:: Team Builder :: LOL Player Raffle ::..</title>
</head>
<body>
<?php
include ("./include.php");

function createRaffle ($number) {
	$connection = new Connection("localhost", "root", "", "esports");
	$connection->connect();
	$playerLOL = new LOLPlayer();
	$playerList = $playerLOL->getAllPlayers($connection);
	
	$roleList = LOLUtilities::createRooster($playerList);
	
	for($i=0;$i<$number;$i++){
		echo "<center><p>Team No. ".(($i)+1)."<br>";
		
		echo "<table border=1 align='center'>" ;
		echo "<tr><td>Position</td><td>Name</td><td>Nick</td></tr>";
		
		$player = $roleList[0][rand(0,$roleList[5]-1)];
		echo "<tr><td>Top:</td><td>".$player->getName()."</td><td>".$player->getNick()."</td></tr>";
		$roleList = LOLUtilities::removePlayerfromAll($roleList, $player);
		
		$player = $roleList[1][rand(0,$roleList[6]-1)];
		echo "<tr><td>Middle:</td><td>".$player->getName()."</td><td>".$player->getNick()."</td></tr>";
		$roleList = LOLUtilities::removePlayerfromAll($roleList, $player);
		
		$player = $roleList[2][rand(0,$roleList[7]-1)];
		echo "<tr><td>Jungle:</td><td>".$player->getName()."</td><td>".$player->getNick()."</td></tr>";
		$roleList = LOLUtilities::removePlayerfromAll($roleList, $player);
		
		$player = $roleList[3][rand(0,$roleList[8]-1)];
		echo "<tr><td>Support:</td><td>".$player->getName()."</td><td>".$player->getNick()."</td></tr>";
		$roleList = LOLUtilities::removePlayerfromAll($roleList, $player);
				
		$player = $roleList[4][rand(0,$roleList[9]-1)];
		echo "<tr><td>Adc:</td><td>".$player->getName()."</td><td>".$player->getNick()."</td></tr>";
		$roleList = LOLUtilities::removePlayerfromAll($roleList, $player);
		
		echo"</table></p></center>";	
	}
}

createRaffle(4);

?>
</body></html>