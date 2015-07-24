<?php

namespace Models;

use Nette,
	Nette\Mail\Message,
	Nette\Mail\SmtpMailer,
	Nette\Bridges\ApplicationLatte\UIMacros;

class Book extends Base
{
	public function getNumberOfVacancies($date, $time)
	{
		$time = str_replace('-', ':', $time);
		$timestamp = date('Y-m-d H:i:s', strtotime(date('Y-m-d', strtotime($date)) . ' ' . date('H:i:s', strtotime($time))));
		return $this->maxNumOfPassengers - $this->getNoOfPassengers($timestamp);
		return 12;
	}

	public function sendConfirmationEmail($form, $values)
	{
		$time = date('H:i:s', strtotime($values->timestamp));
		$date = date('d.m.Y', strtotime($values->timestamp));
		$sail_timestamp_url = str_replace(':', '-', $values->timestamp);
		$sail_timestamp_url = str_replace(' ', '--', $sail_timestamp_url);

		// confirmation url
		$conf_url = 'http://rezervace.plavbyolomouc.cz/emails/conf?name='.urlencode($values->jmeno).'&surname='.urlencode($values->prijmeni).'&phone='.urlencode($values->telefon).'&email='.urlencode($values->email).'&count='.urlencode($values->count).'&date='.urlencode($sail_timestamp_url).'&do=confirm';
		$params = array(
			'date' => $date,
			'time' => $time,
			'conf_url' => $conf_url,
		);
		$latte = new \Latte\Engine;

		$mail = new Message;
		$mail->setFrom('info@plavbyolomouc.cz', 'Ololoď')
		->addTo($values->email)
		->addReplyTo('info@plavbyolomouc.cz', 'Ololoď')
		->setSubject('Ololoď – potvrzení rezervace')
		->setHtmlBody($latte->renderToString(__DIR__ . '/../presenters/templates/Emails/confirmation.latte', $params));

		$mailer = new SmtpMailer(array(
	        'host' => 'mail.gigaserver.cz',
	        'username' => 'info@plavbyolomouc.cz',
	        'secure' => 'ssl',
		));
		$mailer->send($mail);
	}

	public function addConfirmedBooking($name, $surname, $phone, $email, $count, $date)
	{
		// editing the input values
		$name = ucfirst($name);
		$surname = ucfirst($surname);
		$phone = str_replace(' ', '', $phone);

		// validating the phone
		if(strlen($phone) < 9) {
			return false;
		}

		// looking for empty values
		if(empty($name) || empty($surname) || empty($phone)
		|| empty($email) || empty($count) || empty($date)
		|| $count < 1 || $count > 12) {
			return false;
		}

		if(!is_numeric($phone)) {
			return false;
		}

		// composing the timestamp
		$sail_date_arr = explode('--', $date);
		$sail_date_arr[1] = str_replace('-', ':', $sail_date_arr[1]);
		$timestamp = $sail_date_arr[0] . " " . $sail_date_arr[1];

		if($this->getNoOfPassengers($timestamp) + $count > 12) {
			return false;
		}

		// inserting into clients
		$this->database
		->query('INSERT INTO klient(jmeno, prijmeni, telefon, email) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE jmeno = jmeno', $name, $surname, $phone, $email);

		// getting the id of the client just inserted
		$client_id = $this->database->table('klient')
		->where('email', $email)->fetch()->id_klienta;

		// inserting into bookings
		if($this->database
		->query('INSERT INTO rezervace(datum_plavby, id_klienta, pocet_lidi) VALUES (?, ?, ?)', $timestamp, $client_id, $count)
		->getRowCount() == 0) {
			return false;
		}

		$sail_id = $this->database->table('rezervace')
		->where('datum_plavby', $timestamp)->where('id_klienta', $client_id)
		->where('pocet_lidi', $count)->fetch()->id_rezervace;

		$this->sendBookingMail($sail_id, $email);
		return true;
	}

	private function sendBookingMail($sail_id, $email)
	{
		// confirmation url
		$del_url = 'http://rezervace.plavbyolomouc.cz/emails/conf?booking_id='.urlencode($sail_id).'&email='.urlencode($email).'&do=delete';

		$params = array(
			'del_url' => $del_url,
		);
		$latte = new \Latte\Engine;

		$mail = new Message;
		$mail->setFrom('info@plavbyolomouc.cz', 'Ololoď')
		->addTo($email)
		->addReplyTo('info@plavbyolomouc.cz', 'Ololoď')
		->setSubject('Ololoď – rezervace platná')
		->setHtmlBody($latte->renderToString(__DIR__ . '/../presenters/templates/Emails/deletion.latte', $params));

		$mailer = new SmtpMailer(array(
	        'host' => 'mail.gigaserver.cz',
	        'username' => 'info@plavbyolomouc.cz',
	        'password' => 'wu6raCet',
	        'secure' => 'ssl',
		));
		$mailer->send($mail);
	}

	public function deleteBooking($booking_id, $email)
	{
		$client_id = $this->database->query('SELECT id_klienta FROM klient WHERE email = ?', $email)->fetch()->id_klienta;
		if(empty($client_id)) {
			return false;
		}
		if($this->database->query('DELETE FROM rezervace WHERE id_rezervace = ? AND id_klienta = ?', $booking_id, $client_id)->getRowCount() > 0) {
			$this->sendDeleteMail($email);
		} else {
			return false;
		}
		
		return true;
	}

	private function sendDeleteMail($email)
	{
		$latte = new \Latte\Engine;

		$mail = new Message;
		$mail->setFrom('info@plavbyolomouc.cz', 'Ololoď')
		->addTo($email)
		->addReplyTo('info@plavbyolomouc.cz', 'Ololoď')
		->setSubject('Ololoď – rezervace zrušena')
		->setHtmlBody($latte->renderToString(__DIR__ . '/../presenters/templates/Emails/deleted.latte'));

		$mailer = new SmtpMailer(array(
	        'host' => 'mail.gigaserver.cz',
	        'username' => 'info@plavbyolomouc.cz',
	        'password' => 'wu6raCet',
	        'secure' => 'ssl',
		));
		$mailer->send($mail);
	}
}
