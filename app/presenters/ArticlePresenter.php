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

    public function renderShow($id)
    {
        $this->template->article = $this->articleService->getArticle($id);
    }


    public function actionDeleteAll()
    {
        $this->articleService->deleteAll();
        $this->redirect("Article:index");
    }

    public function actionDelete($id)
    {
       $this->articleService->deleteArticle($id);
       $this->redirect("Article:index");
    }

}
