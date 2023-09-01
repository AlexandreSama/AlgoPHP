<?php
    //Je lui dit que je range la class Topic dans un chemin virtuel
    namespace Model\Entities;

    //J'appelle la class Entity qui se trouve dans le chemin virtuel App
    use App\Entity;

    //final => Ne peut pas être en héritage(ne peut pas avoir d'enfants)
    //extends => La class Topic hérite de la class Entity
    final class Topic extends Entity
    {

        //Liste des propriétés de la class Topic selon le
        //Principe d'encapsulation (Visibilité des élements)

        //private => Utilisable uniquement dans la class
        private $id;
        private $title;
        private $creationDate;
        private $closed;
        private $user;
        private $category;

        //public => Utilisable hors de la class
        public function __construct($data){         
            $this->hydrate($data);
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($name)
        {
                $this->title = $name;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        public function getCreationdate(){
            $formattedDate = $this->creationDate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setCreationdate($date){
            $this->creationDate = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }

        /**
         * Get the value of closed
         */ 
        public function getClosed()
        {
                return $this->closed;
        }

        /**
         * Set the value of closed
         *
         * @return  self
         */ 
        public function setClosed($locked)
        {
                $this->closed = $locked;

                return $this;
        }

        public function __toString()
        {
                return $this->getTitle() . $this->getUser() . $this->getCreationdate() . $this->getClosed();
        }

    }
