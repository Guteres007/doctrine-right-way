<?php
namespace App\Components\Article;
use Nette\Application\UI\Control;
class ArticleControl extends Control
{
    public function render($article)
    {
        $template = $this->template;
        // nastavení šablony
        $template->setFile(__DIR__ . '/article.latte');
        // nastavení proměnné z parametru
        $template->article = $article;
        $template->render();
    }
}