<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity
    {
        
        private $id;
        private $username;
        private $email;
        private $password;
        // private $role;
        private $inscriptionDate;
        // private $profilePicture;
        private $isBanned;
        
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
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of inscriptionDate
         */ 
        public function getInscriptionDate()
        {
                return $this->inscriptionDate;
        }

        /**
         * Set the value of inscriptionDate
         *
         * @return  self
         */ 
        public function setInscriptionDate($inscriptionDate)
        {
                $this->inscriptionDate = $inscriptionDate;

                return $this;
        }

        /**
         * Get the value of isBanned
         */ 
        public function getIsBanned()
        {
                return $this->isBanned;
        }

        /**
         * Set the value of isBanned
         *
         * @return  self
         */ 
        public function setIsBanned($isBanned)
        {
                $this->isBanned = $isBanned;

                return $this;
        }
    }
    