<?php
namespace App\TagModule\Service;

use App\TagModule\Entity\Tag;
use Kdyby\Doctrine\EntityManager;

class TagService
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

/*
    public function addTag($value)
    {
        $tag = new Tag;
        $tag->setName($value->tagname);
        $this->entityManager->persist($tag);
        $this->entityManager->flush();
    }
*/
}