<?php
namespace ArticleModule\Service;

use ArticleModule\Entity\Article;
use Kdyby\Doctrine\EntityManager;

class ArticleService
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createArticle()
    {
        $article = new Article;
        $article->setTitle('Name of title');
        $article->setBody('Name of body');
        $this->entityManager->persist($article);
        $this->entityManager->flush();
    }

    public function getAll()
    {
      return $this->entityManager->getRepository(Article::class)->findAll();
    }

    public function getArticle($id)
    {
        return $this->entityManager->getRepository(Article::class)->find($id);
    }

    public function deleteAll()
    {
        foreach ($this->getAll() as $article)
        {

               $this->entityManager->remove($article);
        }
        $this->entityManager->flush();

    }

    public function deleteArticle($id)
    {
        $article = $this->entityManager->getRepository(Article::class)->find($id);
        $this->entityManager->remove($article);
        $this->entityManager->flush();
    }

    public function addArticle($values)
    {
        $article = new Article();
        $article->setTitle($values->title);
        $article->setBody($values->body);
        $this->entityManager->persist($article);
        $this->entityManager->flush();
    }

    public function updateArticle($id,$value)
    {
        $article = $this->getArticle($id);
        $article->setTitle($value->title);
        $article->setBody($value->body);
        $this->entityManager->flush();
    }
}