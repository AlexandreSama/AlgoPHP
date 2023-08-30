<?php
    namespace Model\Entities;

    use App\Entity;

    final class Category extends Entity
    {
        private $id;
        private $categoryName;

        public function __construct($data)
        {
            $this->hydrate($data);
        }

        /**
         * Get the value of îd
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of îd
         *
         * @return  self
         */ 
        public function setId($îd)
        {
                $this->id = $îd;

                return $this;
        }

        /**
         * Get the value of categoryName
         */ 
        public function getCategoryName()
        {
                return $this->categoryName;
        }

        /**
         * Set the value of categoryName
         *
         * @return  self
         */ 
        public function setCategoryName($categoryName)
        {
                $this->categoryName = $categoryName;

                return $this;
        }

        public function __toString()
        {
                return $this->getCategoryName();
        }
    }