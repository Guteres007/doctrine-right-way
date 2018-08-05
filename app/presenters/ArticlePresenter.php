<?php

namespace App\Presenters;
use ArticleModule\Service\ArticleService;
use Nette;


class ArticlePresenter extends Nette\Application\UI\Presenter
{

    /** @var ArticleService @inject */
    public $articleService;

    public function renderIndex()
    {
      dump($this->articleService->getAll());

    }


    public function actionDelete()
    {
        $this->articleService->deleteAll();
    }

}
