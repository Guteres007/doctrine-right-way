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



    }
