<?php

namespace Models;

use Nette;

class Home extends Base
{
	private $no_sail_dates = array(
		'13.07.2015',
		'14.07.2015',
		'15.07.2015',
		'16.07.2015',
		'17.07.2015',
		'18.07.2015',
	);

	public function getAllSails()
	{
		$sails = array();
		// getting all dates from now to the end of season
		for($n = 0; $n < 150; $n++) {
			// getting the user-friendly date
			$date = date('d.m.Y', strtotime(' +'.$n.'day'));
			// getting the url-parsed date
			$date_url = date('d-m-Y', strtotime(' +'.$n.'day'));
			// getting the day of the week
			$day_of_the_week = date('l', strtotime(' +'.$n.'day'));
			// translating it
			$day_of_the_week = $this->translateDayToCzech($day_of_the_week);

			// if the current date is in no sail dates
			if(in_array($date, $this->no_sail_dates)) {
				continue;
			}

			// adding values to the result array
			$sails[$n]['date'] = $date;
			$sails[$n]['date_url'] = $date_url;
			$sails[$n]['day_of_the_week'] = $day_of_the_week;
			$sails[$n]['sail_times'] = $this->getSailTimes($day_of_the_week);

			// end of season
			if($date == "20.09.2015") {
				break;
			}
		}
		return $sails;
	}

	private function getSailTimes($day)
	{
		switch($day)
		{
		case 'Pátek':
			$times = '14:00 – 17:00 (po hodině)';
			break;
		case 'Sobota':
			$times = '10:00 – 17:00 (po hodině, bez 12:00)';
			break;
		case 'Neděle':
			$times = '10:00 – 17:00 (po hodině, bez 12:00)';
			break;
		default:
			$times = '14:00 – 18:00 (po hodině)';
		}
		return $times;
	}
}
