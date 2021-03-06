<?php
namespace App\ArticleModule\Service;

use App\ArticleModule\Entity\Article;
use App\TagModule\Entity\Tag;

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
//tohle platí jen pro jednu část na homepage
    public function createArticle()
    {
        $tag = new Tag();
        $tag->setName("tag");

        $article = new Article();
        $article->setTitle("title");
        $article->setBody("body");
        $article->setTag($tag);

        $this->entityManager->persist($article,$tag);
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
        $tag = $article->getTag();
        $this->entityManager->remove($article,$tag);
        $this->entityManager->flush();
    }

    public function addArticle($values)
    {
        $tag = new Tag();
        $tag->setName($values->tagname);

        $article = new Article();
        $article->setTitle($values->title);
        $article->setBody($values->body);
        $article->setTag($tag);

        $this->entityManager->persist($article,$tag);
        $this->entityManager->flush();

    }

    public function updateArticle($id,$value)
    {
        $article = $this->getArticle($id);
        $article->setTitle($value->title);
        $article->setBody($value->body);
        $article->getTag()->setName($value->tagname);
        $this->entityManager->flush();
    }
}