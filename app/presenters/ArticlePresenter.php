<?php

namespace App\Presenters;
use App\ArticleModule\Service\ArticleService;
use App\TagModule\Service\TagService;
use Nette;
use Nette\Application\UI;
use App\Components\Article\ArticleControl;



class ArticlePresenter extends Nette\Application\UI\Presenter
{

    /** @var ArticleService @inject */
    public $articleService;

    /** @var TagService @inject */
    public $tagService;

    public function renderIndex()
    {

      $this->template->articles = $this->articleService->getAll();


    }

    /**
     * @return ArticleControl
     */
    public function createComponentArticle(): ArticleControl
    {
        $article = new ArticleControl();
        return $article;
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

    public function handleDelete($id)
    {
       if($this->isAjax())
        {
            $this->articleService->deleteArticle($id);
            $this->template->articles = $this->articleService->getAll();
            $this->payload->message = 'Success';
            $this->redrawControl('articles');
        }

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
            "tagname"=>$article->getTag()->getName(),
           ]);
    }

    public function createComponentArticleForm()
    {
        $form = new UI\Form;
        $form->addText("title", "Title:");
        $form->addText("body", "Body:");
        $form->addText("tagname", "slug:");
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

        //vytvořím article s tagem
        $this->articleService->addArticle($values);

        $this->flashMessage('Přidáno.');
        $this->redirect('Article:index');
    }


}
