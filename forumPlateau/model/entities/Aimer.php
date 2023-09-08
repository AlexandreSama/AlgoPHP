<?php

namespace Model\Entities;

use App\Entity;
use Model\Entities\User;
use Model\Entities\Topic;

final class Aimer extends Entity
{
    private User $user;
    private Topic $topic;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of userId
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Get the value of topicId
     */ 
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topicId
     *
     * @return  self
     */ 
    public function setTopic($topic)
    {
        $this->topic[] = $topic;

        return $this;
    }
}