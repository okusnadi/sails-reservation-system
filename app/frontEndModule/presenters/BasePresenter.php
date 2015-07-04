<?php

namespace App\Presenters;

use Nette,
	Models;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	protected $homeModel;
	protected $sailModel;
	protected $bookModel;

	final public function injectBase(Models\Home $homeModel, Models\Sail $sailModel, Models\Book $bookModel)
	{
		$this->homeModel = $homeModel;
		$this->sailModel = $sailModel;
		$this->bookModel = $bookModel;
	}

}
