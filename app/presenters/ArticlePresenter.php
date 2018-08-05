<?php

namespace App\Presenters;
use ArticleModule\Service\ArticleService;
use Nette;
use Nette\Application\UI;


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

    public function renderNew()
    {


    }

    public function renderUpdate($id)
    {
        $article = $this->articleService->getArticle($id);
        $this['articleForm']->setDefaults([
            "title"=>$article->getTitle(),
            "body"=>$article->getBody(),
           ]);
    }

    public function createComponentArticleForm()
    {
        $form = new UI\Form;
        $form->addText("title", "Title:");
        $form->addText("body", "Body:");
        $form->addSubmit("submit", "Odeslat");
        $form->onSuccess[] = [$this, 'articleFormSucceeded'];
        return $form;
    }

    public function articleFormSucceeded( $form, $values)
    {
        $articleId = $this->getParameter('id');

        if ($articleId)
        {
           $this->articleService->updateArticle($articleId,$values);
           $this->redirect('Article:index');
        }
        $this->articleService->addArticle($values);
        $this->flashMessage('Přidáno.');
        $this->redirect('Article:index');
    }


}
