<?php

namespace App\Presenters;

use Nette,
	Nette\Application\UI\Form,
	Models;

class PlavbaPresenter extends BasePresenter
{
	public function renderCasy($date)
	{
		$this->template->times = $this->sailModel->getSailTimes($date);
		$this->template->max = $this->sailModel->maxNumOfPassengers;
	}

	public function renderRezervovat($date, $time)
	{
		$this->template->date = $date;
		$this->template->time = $time;
	}

	public function createComponentBookForm()
	{
		$form = new Form;

		$form->addText('jmeno')->setRequired()
		->setAttribute('placeholder', 'Jan')
		->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 2)
		->addRule(Form::MAX_LENGTH, 'Jmeno může mít maximálně %d znaků', 40);

		$form->addText('prijmeni')->setRequired()
		->setAttribute('placeholder', 'Novák')
		->addRule(Form::MIN_LENGTH, 'Příjmení musí mít alespoň %d znaky', 2)
		->addRule(Form::MAX_LENGTH, 'Příjmení může mít maximálně %d znaků', 40);

		$form->addText('telefon')->setRequired()->setType('tel')
		->setAttribute('placeholder', '123456789')
		->addRule(Form::PATTERN, 'Telefon musí být ve správném tvaru', '\+?[()\/0-9. \-]{9,}');

		$form->addText('email')->setRequired()->setType('email')
		->setAttribute('placeholder', 'jan.novak@email.cz')
		->addRule(Form::EMAIL, 'Email musí být ve správném tvaru');

		$form->addText('count')->setRequired()->setType('number')
		->setAttribute('min', 1)->setAttribute('max', 12)
		->setDefaultValue('1');

		$form->addHidden('timestamp');
		$form->addSubmit('submit')->setAttribute('class', 'submit');

		$form->onSuccess[] = array($this, 'bookFormSucceeded');
		return $form;
	}

	public function bookFormSucceeded($form, $values)
	{
		$this->bookModel->sendConfirmationEmail($form, $values);
		$this->flashMessage('Potvrzení rezervace bylo odesláno na Váš email.', 'success');
		$this->redirect('this');
	}
}
