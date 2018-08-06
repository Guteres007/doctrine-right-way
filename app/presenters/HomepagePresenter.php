<?php

namespace App\Presenters;
use App\ArticleModule\Service\ArticleService;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /** @var ArticleService @inject */
    public $articleService;

    public function actionDefault()
    {
        for ($i=0; $i < 20; $i++)
        {
        $this->articleService->createArticle();
        }
    }


}
