<?php

class Wordsearch extends CI_Controller {

	private	$wordList,
			$word,
			$boardData,
			$key,
			$board,
			$puzzle,
			$keyPuzzle;

	public function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->load->view('puzzles/wordsearch/wordsearch');
	}
	
	function generate() {
		$this->_wordList = $this->input->post('wordList');
		if ($this->_wordList == "") {
			$this->_word = array(
				"JAVA",
				"WEB",
				"PHP",
				"HTML",
				"CSS",
				"NET",
				"BLOG",
				"WIKI"
			);
			$this->_boardData = array(
				"width"		=> 10,
				"height"	=> 10,
				"name"		=> "Generic Puzzle"
			);
			$legalBoard = FALSE;
			while ($legalBoard == FALSE) {
				$this->clearBoard();
				$legalBoard = $this->fillBoard();
			}
			
			$this->_key = $this->_board;
			$this->_keyPuzzle = $this->makeBoard($this->_key);
			
			$this->addFoils();
			$this->_puzzle = $this->makeBoard($this->_board);
			
			$this->printPuzzle();
		} else {
			$name = $this->input->post('name');
			$width = $this->input->post('width');
			$height = $this->input->post('height');
			$this->_boardData = array(
				"width"		=> $width,
				"height"	=> $height,
				"name"		=> $name
			);
			
			if ($this->parseList() == TRUE) {
				$legalBoard = FALSE;
				while ($legalBoard == FALSE) {
					$this->clearBoard();
					$legalBoard = $this->fillBoard();
				}
				
				$this->_key = $this->_board;
				$this->_keyPuzzle = $this->makeBoard($this->_key);
				
				$this->addFoils();
				$this->_puzzle = $this->makeBoard($this->_board);
				
				$this->printPuzzle();
			}
		}
	}
	
	function parseList() {
		$itWorked = TRUE;
		$this->_wordList = strtoupper($this->_wordList);
		$this->_word = explode("\n", $this->_wordList);
		foreach ($this->_word as $currentWord) {
			$currentWord = rtrim($currentWord);
			if ((strLen($currentWord) > $this->_boardData['width']) && (strLen($currentWord) > $this->_boardData['height'])) {
				echo "$currentWord is too long for puzzle";
				$itWorked = FALSE;
			}
		}
		return $itWorked;
	}
	
	function clearBoard() {
		for ($row = 0; $row < $this->_boardData['height']; $row++) {
			for ($col = 0; $col < $this->_boardData['width']; $col++) {
				$this->_board[$row][$col] = ".";
			}
		}
	}
	
	function addWord($theWord, $dir) {
		$theWord = rtrim($theWord);
		$itWorked = TRUE;
		
		switch ($dir) {
			case "E":
				$newCol = rand(0, $this->_boardData['width'] - 1 - strlen($theWord));
				$newRow = rand(0, $this->_boardData['height'] - 1);
				
				for ($i = 0; $i < strlen($theWord); $i++) {
					$boardLetter = $this->_board[$newRow][$newCol + $i];
					$wordLetter = substr($theWord, $i, 1);
					if (($boardLetter == $wordLetter) || ($boardLetter == ".")) {
						$this->_board[$newRow][$newCol + $i] = $wordLetter;
					} else {
						$itWorked = FALSE;
					}
				}
			break;
			
			case "W":
				$newCol = rand(strlen($theWord), $this->_boardData['width'] - 1);
				$newRow = rand(0, $this->boardData['height'] - 1);
				
				for ($i = 0; $i < strlen($theWord); $i++) {
					$boardLetter = $this->_board[$newRow][$newCol - $i];
					$wordLetter = substr($theWord, $i, 1);
					if (($boardLetter == $wordLetter) || ($boardLetter == ".")) {
						$this->_board[$newRow][$newCol + $i] = $wordLetter;
					} else {
						$itWorked = FALSE;
					}
				}
			break;
			
			case "S":
				$newCol = rand(0, $this->_boardData['width'] - 1);
				$newRow = rand(0, $this->_boardData['height'] - 1 - strlen($theWord));
				
				for ($i = 0; $i < strlen($theWord); $i++) {
					$boardLetter = $this->_board[$newRow + $i][$newCol];
					$wordLetter = substr($theWord, $i, 1);
					if (($boardLetter == $wordLetter) || ($boardLetter == ".")) {
						$this->_board[$newRow + $i][$newCol] = $wordLetter;
					} else {
						$itWorked = FALSE;
					}
				}
			break;
			
			case "N":
				$newCol = rand(0, $this->_boardData['width'] - 1);
				$newRow = rand(strlen($theWord), $this->_boardData['height'] - 1);
				
				for ($i = 0; $i < strlen($theWord); $i++) {
					$boardLetter = $this->_board[$newRow - $i][$newCol];
					$wordLetter = substr($theWord, $i, 1);
					if (($boardLetter == $wordLetter) || ($boardLetter == ".")) {
						$this->_board[$newRow - $i][$newCol] = $wordLetter;
					} else {
						$itWorked = FALSE;
					}
				}
			break;
		}
		return $itWorked;
	}
	
	function fillBoard() {
		$direction = array("N", "S", "E", "W");
		$itWorked = TRUE;
		$counter = 0;
		$keepGoing = TRUE;
		while ($keepGoing) {
			$dir = rand(0, 3);
			$result = $this->addWord($this->_word[$counter], $direction[$dir]);
			if ($result == FALSE) {
				$keepGoing = FALSE;
				$itWorked = FALSE;
			}
			$counter++;
			if ($counter >= count($this->_word)) {
				$keepGoing = FALSE;
			}
		}
		return $itWorked;
	}
	
	function makeBoard($theBoard) {
		$puzzle = "";
		$puzzle .= "<table boarder=0>\n";
		for ($row = 0; $row < $this->_boardData['height']; $row++) {
			$puzzle .= "<tr>\n";
			for ($col = 0; $col < $this->_boardData['width']; $col++) {
				$puzzle .= "	<td width=15>{$theBoard[$row][$col]}</td>\n";
			}
			$puzzle .= "</tr>\n";
		}
		$puzzle .= "</table>\n";
		return $puzzle;
	}
	
	function addFoils() {
		for ($row = 0; $row < $this->_boardData['height']; $row++) {
			for ($col = 0; $col < $this->_boardData['width']; $col++) {
				if ($this->_board[$row][$col] == ".") {
					$newLetter = rand(65, 90);
					$this->_board[$row][$col] = chr($newLetter);
				}
			}
		}
	}
	
	function printPuzzle() {
		echo "<center>
				<h1>{$this->_boardData["name"]}</h1>
				$this->_puzzle
				<h3>Word List</h3>
				<table border='0'>";
		
		foreach ($this->_word as $theWord) {
			echo "<tr><td>$theWord</td></tr>\n";
		}
		echo "</table>\n";
		$puzzleName = $this->_boardData["name"];
		echo "<br /><br />
				<form action='printKey' method='post'>
				<input type='hidden' name='key' value='" . $this->_keyPuzzle . "' />
				<input type='hidden' name='puzzleName' value='$puzzleName' />
				<input type='submit' value='Show Answer Key'>
				</form>
				<a href='" . base_url() . "puzzles/wordsearch'>Create New Wordsearch</a>
				</center>";
	}

	function printKey() {
		$key = $this->input->post('key');
		$puzzleName = $this->input->post('puzzleName');
		echo "<center>
				<h1>$puzzleName Answer Key</h1>
				$key
				</center>";
	}
	
}