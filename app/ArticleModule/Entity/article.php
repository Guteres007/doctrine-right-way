<?php

namespace App\ArticleModule\Entity;


    use Doctrine\ORM\Mapping as ORM;
    use Kdyby\Doctrine\Entities\Attributes\Identifier;

    /**
     * @ORM\Entity
     * @ORM\Table(name="article")
     */
    class Article
    {
        use Identifier;




        /**
         * One Article has One Tag.
         * @ORM\OneToOne(targetEntity="App\TagModule\Entity\Tag")
         * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
         */
        private $tag;




          /**
           * @ORM\Column(type="string")
           */
          private $title;

            /**
           * @ORM\Column(type="text")
           */
          private $body;


        /**
         * @return string
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param string $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }


        /**
         * @return string
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param string $body
         */
        public function setBody($body)
        {
            $this->body = $body;
        }

        /**
         * @param string $tag
         */
        public function setTag(\App\TagModule\Entity\Tag $tag = null)
        {
            $this->tag = $tag;
        }

        /**
         * @return mixed
         */
        public function getTag()
        {
            return $this->tag;
        }

    }
