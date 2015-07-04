<?php

namespace Models;

use Nette;


abstract class Base extends Nette\Object
{
	public $maxNumOfPassengers = 12;
	protected $database;

	public function __construct(Nette\Database\Context $db)
	{
		$this->database = $db;
	}

	protected function translateDayToCzech($eng_day)
	{
		switch($eng_day)
		{
		case 'Monday':
			$czech_day = 'Pondělí';
			break;
		case 'Tuesday':
			$czech_day = 'Úterý';
			break;
		case 'Wednesday':
			$czech_day = 'Středa';
			break;
		case 'Thursday':
			$czech_day = 'Čtvrtek';
			break;
		case 'Friday':
			$czech_day = 'Pátek';
			break;
		case 'Saturday':
			$czech_day = 'Sobota';
			break;
		case 'Sunday':
			$czech_day = 'Neděle';
			break;
		default:
			return false;
		}
		return $czech_day;
	}

	protected function getNoOfPassengers($timestamp)
	{
		$results = $this->database->query('
			SELECT SUM(rezervace.pocet_lidi) AS obsazenost
			FROM rezervace WHERE datum_plavby = ?', $timestamp);

		$obsazenost = $results->fetch()->obsazenost;

		if($obsazenost == NULL) {
			return 0;
		} else {
			return $obsazenost;
		}
	}
}
