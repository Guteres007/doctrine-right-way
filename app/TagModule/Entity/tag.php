<?php

namespace App\TagModule\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Kdyby\Doctrine\Entities\Attributes\Identifier;

    /**
     * @ORM\Entity
     * @ORM\Table(name="tag")
     */
    class Tag
    {
        use Identifier;

        /**
         * One Tag has One Article.
         * @ORM\OneToOne(targetEntity="App\ArticleModule\Entity\Article")
         * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
         */
        private $article;





          /**
           * @ORM\Column(type="text")
           */
          private $name;



        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        public function getArticle()
        {
            return $this->article;
        }

        public function setArticle($article)
        {
            $this->article = $article;
        }

    }
