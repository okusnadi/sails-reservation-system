<?php

namespace App\Presenters;

use Nette,
	Models;

class HomepagePresenter extends BasePresenter
{
	public function renderDefault()
	{
		$this->template->sails = $this->homeModel->getAllSails();
	}
}
