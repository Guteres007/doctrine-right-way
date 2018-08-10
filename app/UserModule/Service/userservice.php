<?php
namespace App\UserModule\Service;

use App\UserModule\Entity\User;


use Kdyby\Doctrine\EntityManager;
use Nette\Security\Passwords;

class UserService
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    private $passwords;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

    }



    public function hash($password)
    {
        return Passwords::hash($password);
    }




}