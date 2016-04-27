<?php

namespace AppBundle\Entity;

use \Doctrine\ORM\EntityRepository;


class UserRepository extends EntityRepository
{
    public function newUser()
    {
        return new User();
    }
}