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

      $this->template->articles = $this->articleService->getAll();


    }


    public function actionDelete()
    {
        $this->articleService->deleteAll();
        $this->redirect("Article:index");
    }

}
