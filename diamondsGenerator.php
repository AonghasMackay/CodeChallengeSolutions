<?php
/**
 * Written for PHP 8.1.13
 * 
 * Builds diamonds based on a provided height
 */
class diamond {
	function __construct(?int $height = 9) {
		$this->height = $height;
	}
	
	public function outputDiamond(bool $displayHorizontalDivider = true) {
		$diamondArray = $this->buildDiamondArray();
		
		foreach($diamondArray as $row) {
			echo $row;
		}
		
		if($displayHorizontalDivider) {
			echo "\n \n --------------------------------------------- \n \n";
		}
	}
	
    /**
     * Builds a pyramid based on half the height of the diamond object.
     * Duplicates pyramid and flips it to create a diamond
     */
	private function buildDiamondArray() {
		$height = $this->height;
		$halfwayPoint = round($height / 2);
		
		$pyramidArray = $this->buildPyramidArray($halfwayPoint);
		$pyramidArrayReversed = $this->reversePyramidArray($pyramidArray, $height);
		
		return array_merge($pyramidArray, $pyramidArrayReversed);
	}
	
	private function reversePyramidArray(array $pyramidArray, int $diamondHeight) {
		$pyramidArrayReversed = array_reverse($pyramidArray);
		
        //If the diamond is an odd height then remove a row from the reversed pyramid to prevent the pyramid from being one row too tall
		if($diamondHeight % 2 != 0) {
			array_shift($pyramidArrayReversed);
		}
		
		return $pyramidArrayReversed;
	}
	
    /**
     * Builds a pyramid array based on the provided height argument by 
     * looping through the rows and adding those rows to the pyramid array
     */
	private function buildPyramidArray(int $pyramidHeight) {
		$pyramidArray = [];
		
		for($row = 1; $row <= $pyramidHeight; $row++) {
			$asterixes = str_repeat('*', ($row - 1) * 2 + 1);
			$spaces = str_repeat(' ', $pyramidHeight - $row);
				
			$pyramidArray[]= $spaces . $asterixes . "\n";
		}
		
		return $pyramidArray;
	}
}

function runDiamondTests(Array $heights = [8, 15, 5, 40, 17, 12, 28]) {
    //test the diamond class works without a provided height value before looping through array of heights
	$testDiamond = new diamond();
	$testDiamond->outputDiamond();	
	
	foreach($heights as $height) {
		$testDiamond = new diamond($height);
		$testDiamond->outputDiamond();	
	}
}

runDiamondTests();