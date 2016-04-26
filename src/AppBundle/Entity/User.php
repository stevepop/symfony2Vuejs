<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="first_name")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="last_name")
     */
    private $lastName;

    /**
     * @var \AppBundle\Entity\Department
     *
     *
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="user")
     * @ORM\JoinColumn(name="dept_id", referencedColumnName="id")
     */
    private $department;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=false, name="dob")
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="home_address")
     */
    private $homeAddress;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="email")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="mobile")
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, name="phone")
     */
    private $phone;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getHomeAddress()
    {
        return $this->homeAddress;
    }

    /**
     * @param string $homeAddress
     */
    public function setHomeAddress($homeAddress)
    {
        $this->homeAddress = $homeAddress;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getFullName()
    {
        return "{ $this->getFirstName() $this->getLastName()}";
    }

    public function __toString()
    {
        return $this->getFullName();
    }
}