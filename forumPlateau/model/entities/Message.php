<?php

    namespace Model\Entities;

    use App\Entity;

    final class Message extends Entity
    {
        private $id;
        private $messageText;
        private $creationDate;
        private $user;
        private $topic;
        
        public function __construct($data)
        {
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
         * Get the value of messageText
         */ 
        public function getMessageText()
        {
                return $this->messageText;
        }

        /**
         * Set the value of messageText
         *
         * @return  self
         */ 
        public function setMessageText($messageText)
        {
                $this->messageText = $messageText;

                return $this;
        }

        /**
         * Get the value of creationDate
         */ 
        public function getCreationDate()
        {
                return $this->creationDate;
        }

        /**
         * Set the value of creationDate
         *
         * @return  self
         */ 
        public function setCreationDate($creationDate)
        {
                $this->creationDate = $creationDate;

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

        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
                return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }

        public function __toString()
        {
                return $this->getMessageText() . $this->getCreationDate() . $this->getUser() . $this->getTopic();
        }
    }