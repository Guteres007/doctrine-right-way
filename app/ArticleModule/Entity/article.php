<?php

namespace ArticleModule\Entity;

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


    }
