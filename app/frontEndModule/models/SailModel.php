<?php

namespace Models;

use Nette;

class Sail extends Base
{
	private $weekend_times = array(
		'10:00' => '10-00',
		'11:00' => '11-00',
		'13:00' => '13-00',
		'14:00' => '14-00',
		'15:00' => '15-00',
		'16:00' => '16-00',
		'17:00' => '17-00',
	);

	private $week_times = array(
		'14:00' => '14-00',
		'15:00' => '15-00',
		'16:00' => '16-00',
		'17:00' => '17-00',
		'18:00' => '18-00',
	);

	private $friday_times = array(
		'14:00' => '14-00',
		'14:55' => '15-00',
		'16:00' => '16-00',
		'17:00' => '17-00',
	);

	public function getSailTimes($date)
	{
		// the result times array
		$times_arr = array();
		$times_arr['date_url'] = $date;
		$times_arr['date'] = date('d.m.Y', strtotime($date));
		$times_arr['passed'] = false;

		$day_of_the_week = date('l', strtotime($times_arr['date']));
		$times_arr['day_of_the_week'] = $this->translateDayToCzech($day_of_the_week);

		// if the date is in the past
		if(date('Y-m-d') > date('Y-m-d', strtotime($times_arr['date']))) {
			$times_arr['passed'] = true;
		}
		$day_type = $this->getDayType($times_arr['day_of_the_week']);

		// getting the right sail times
		if($day_type == 'Week') {
			if($day_of_the_week == 'Pátek') {
				$times = $this->friday_times;
			} else {
				$times = $this->week_times;
			}
		} elseif($day_type == 'Weekend') {
			$times = $this->weekend_times;
		}

		foreach($times as $time => $time_url) {
			$times_arr['times'][$time]['time'] = $time;
			$times_arr['times'][$time]['time_url'] = $time_url;
			$times_arr['times'][$time]['passed'] = false;

			// is the time in the past?
			$time_formatted = date('Gi', strtotime($time));
			if($this->isItToday($times_arr['date'])) {
				if($time_formatted < date('Gi')) {
					$times_arr['times'][$time]['passed'] = true;
				}
			}

			$timestamp = date('Y-m-d H:i:s', strtotime($times_arr['date'] . ' ' . $time_formatted));
			$times_arr['times'][$time]['obsazenost'] = $this->getNoOfPassengers($timestamp);
		}
		return $times_arr;
	}

	private function getDayType($day_czech)
	{
		switch($day_czech)
		{
		case 'Sobota':
			$type = 'Weekend';
			break;
		case 'Neděle':
			$type = 'Weekend';
			break;
		default:
			$type = 'Week';
		}
		return $type;
	}

	private function isItToday($date)
	{
		if($date == date('d.m.Y')) {
			return true;
		}
		return false;
	}
}
