<?php

namespace AppBundle\Entity;

use \Doctrine\ORM\EntityRepository;

class ContactRepository extends EntityRepository
{
    public function newContact()
    {
        return new Contact();
    }
}