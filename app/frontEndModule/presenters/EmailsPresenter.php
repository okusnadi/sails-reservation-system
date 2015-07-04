<?php

namespace App\Presenters;

use Nette,
	Models;

class EmailsPresenter extends BasePresenter
{
	public function handleConfirm($name, $surname, $phone, $email, $count, $date)
	{
		if($this->bookModel->addConfirmedBooking($name, $surname, $phone, $email, $count, $date)) {
			$this->flashMessage('Děkujeme za potvrzení. Vaše rezervace je nyní platná.', 'success');
			$this->redirect('Homepage:default');
		} else {
			$this->flashMessage('Vložené hodnoty jsou neplatné. Neupravujte prosím odkaz v emailu.', 'error');
			$this->redirect('Homepage:default');
		}
	}

	public function handleDelete($booking_id, $email)
	{
		if($this->bookModel->deleteBooking($booking_id, $email)) {
			$this->flashMessage('Vaše rezervace byla odstraněna.', 'success');
			$this->redirect('Homepage:default');
		} else {
			$this->flashMessage('Vložené hodnoty jsou neplatné. Neupravujte prosím odkaz v emailu.', 'error');
			$this->redirect('Homepage:default');
		}
	}
}
