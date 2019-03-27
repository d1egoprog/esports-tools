<?php
class LOLUtilities {
	
	public static function removePlayerfromAll($roleList, $player){
		$roleList[0] = LOLUtilities::removePlayer($roleList[0], $player);
		$roleList[1] = LOLUtilities::removePlayer($roleList[1], $player);
		$roleList[2] = LOLUtilities::removePlayer($roleList[2], $player);
		$roleList[3] = LOLUtilities::removePlayer($roleList[3], $player);
		$roleList[4] = LOLUtilities::removePlayer($roleList[4], $player);
		
		$roleList[5] = count($roleList[0]);
		$roleList[6] = count($roleList[1]);
		$roleList[7] = count($roleList[2]);
		$roleList[8] = count($roleList[3]);
		$roleList[9] = count($roleList[4]);
				
		return $roleList;
	}
	
	public static function removePlayer($array, $player){
		foreach($array as $element) {
			if ($element->getNick() == $player->getNick()){
				$key = array_search($element, $array); 
				unset($array[$key]);
			}
		}
		/*if (empty($array)) {
			 die('There is not enough players for this team!');
		}*/
		return array_values($array);
	}
	
	public static function createRooster($playerList){
		$top = array();
		$middle  = array();
		$jungle  = array();
		$support  = array();
		$adc = array();
		
		foreach ($playerList as $player) {
			if ($player->getPrimaryRole() == "1" || $player->getSecundaryRole() == "1"){
				$top[] = $player;
			}
			if ($player->getPrimaryRole() == "2" || $player->getSecundaryRole() == "2"){
				$middle[] = $player;
			}
			if ($player->getPrimaryRole() == "3" || $player->getSecundaryRole() == "3"){
				$jungle[] = $player;
			}
			if ($player->getPrimaryRole() == "4" || $player->getSecundaryRole() == "4"){
				$support[] = $player;
			}
			if ($player->getPrimaryRole() == "5" || $player->getSecundaryRole() == "5"){
				$adc[] = $player;
			}
		}
		
		$maxTop = count($top);
		$maxMiddle = count($middle);
		$maxJungle = count($jungle);
		$maxSupport = count($support);
		$maxAdc = count($adc);
				
		$roleList = array($top, $middle, $jungle, $support, $adc, $maxTop, $maxMiddle, $maxJungle, $maxSupport, $maxAdc);
		return $roleList;
	}
	
	public static function showRole($number){
		if ($number==1)
			return "Top";
		if ($number==2)
			return "Middle";
		if ($number==3)
			return "Jungle";
		if ($number==4)
			return "Support";
		if ($number==5)
			return "Adc";
		if ($number==0)
			return "N/A";
	}

}
?>