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

    public function deleteAll()
    {
        foreach ($this->getAll() as $article)
        {

               $this->entityManager->remove($article);
                $this->entityManager->flush();
        }

    }

}