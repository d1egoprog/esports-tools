<?php
class Connection {
	
	public $server;
	public $port;
	public $user;
	public $password;
	public $dataBase;
	public $query;
	
	public $pointer;
	
	public function __construct($server, $user, $password, $dataBase){
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->dataBase = $dataBase;
	}
	
	function connect() {
        $connection = mysqli_connect($this->server, $this->user, $this->password, $this->dataBase);
		$this->pointer = $connection;
        if (!$connection) {
            die('Can not connect to Database!');
        } else {
			//echo 'Connection established!';
		}
        return $this->pointer;
    }

    function close() {
        mysqli_close($this->pointer);
        //echo 'connection closed!';
    }
	
	function executeQuery($query){
		$this->query = $query;
		$utf8 = $this->pointer->query("SET NAMES 'utf8'");
		//echo $query.'\n'.
		$result = mysqli_query($this->pointer, $this->query);
		return $result;	
	}

	
}

?>