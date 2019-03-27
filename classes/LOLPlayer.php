<?php
class LOLPlayer {
	
	public $name;
	public $nick;
	public $primaryRole;
	public $secundaryRole;
	
	public $connection;
	
	public function __construct() {
        $this->name = "";
		$this->nick = "";
		$this->primaryRole = "";
		$this->secundaryRole = "";
		$argv = func_get_args();
        switch( func_num_args() ) {
            case 4:
                self::__construct4( $argv[0], $argv[1], $argv[2], $argv[3]);
         }
    }
	
	public function __construct4($name, $nick, $primaryRole, $secundaryRole){
		$this->name = $name;
		$this->nick = $nick;
		$this->primaryRole = $primaryRole;
		$this->secundaryRole = $secundaryRole;
	}

	public function getAllPlayers($connection){
		$this->connection = $connection;
		$result = $connection->executeQuery("select * from playerslol;");
		$playerList = array();
		while ($row = mysqli_fetch_array($result)){
			if ($row !=NULL) {
				$name = $row['name'];
				$nick = $row['nick'];
				$primaryRole = $row['primaryRole'];
				$secundaryRole = $row['secundaryRole'];
				$player = new LOLPlayer($name, $nick, $primaryRole, $secundaryRole);
				$playerList[] = $player;
			}
		}
		return $playerList;
	}
	
	public function create($connection, $player){
		$this->connection = $connection;
		$query = "insert into playerslol(name, nick, primaryRole, secundaryRole) values(";
		$query = $query."'".$player->name."', "; 
		$query = $query."'".$player->nick."', "; 
		$query = $query.$player->primaryRole.", ";
		$query = $query.$player->secundaryRole.");";
		$result = $connection->executeQuery($query);
		return $result;
	}
	
	public function deleteByNick($connection, $nick){
		$this->connection = $connection;
		$query = "delete from playerslol where nick = '".$nick."';";
		$result = $connection->executeQuery($query);
		return $result;
	}
	
	public function getPlayerByNick($connection, $nick){
		$this->connection = $connection;
		$query = "select * from playerslol where nick = '".$nick."';";
		$player = new LOLPlayer();
		$result = $connection->executeQuery($query);
		while ($row = mysqli_fetch_array($result)){
			if ($row !=NULL) {
				$player->name = $row['name'];
				$player->nick = $row['nick'];
				$player->primaryRole = $row['primaryRole'];
				$player->secundaryRole = $row['secundaryRole'];
			}
		}
		return $player;
	}
	
	public function editPlayer($connection, $player){
		$this->connection = $connection;
		$query = "update playerslol set ";
		$query = $query."name='".$player->name."', "; 
		$query = $query."nick='".$player->nick."', "; 
		$query = $query."primaryRole='".$player->primaryRole.", ";
		$query = $query."secundaryRole='".$player->secundaryRole.", "; 
		$query = $query."where nick = '".$nick."';";
		$result = $connection->executeQuery($query);
		return $result;
	}
		
	public function getName() {
		return $this->name;
	}   

	public function setName($value) {
		$this->name = $value;
	}

	public function getNick() {
		return $this->nick;
	}   

	public function setNick($value) {
		$this->nick = $value;
	}

	public function getPrimaryRole() {
		return $this->primaryRole;
	}   

	public function setPrimaryRole($value) {
		$this->primaryRole = $value;
	}

	public function getSecundaryRole() {
		return $this->secundaryRole;
	}   

	public function setSecundaryRole($value) {
		$this->secundaryRole = $value;
	}

	function setConexion($value) {
		$this->connection = $value;
	}
}
?>