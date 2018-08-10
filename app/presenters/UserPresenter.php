<?php

namespace App\Presenters;
use App\UserModule\Service\UserService;

use Nette;
use Nette\Application\UI;


class UserPresenter extends Nette\Application\UI\Presenter
{


    /** @var UserService @inject */
    public $userService;


    public function renderIndex()
    {
        dump($this->userService->hash("sdsdasdsadadas"));
    }




}