<?php

namespace App\Presenters;
use ArticleModule\Service\ArticleService;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /** @var ArticleService @inject */
    public $articleService;

    public function actionDefault()
    {
        $this->articleService->createArticle();
    }


}
