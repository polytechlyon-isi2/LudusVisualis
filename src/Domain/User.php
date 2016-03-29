<?php

namespace LudusVisualis\Domain;
use Symfony\Component\Security\Core\User\UserInterface;
class User implements UserInterface
{
    /**
     * User id.
     *
     * @var integer
     */
    private $id;

    /**
     * User email.
     *
     * @var string
     */
    private $email;
    
    /**
     * User password.
     *
     * @var string
     */
    private $password;
    
    /**
     * User descriptionLong.
     *
     * @var string
     */
    private $lastName;
    
    /**
     * User author.
     *
     * @var string
     */
    private $firstName;
    
    /**
     * User adresse.
     *
     * @var string
     */
    private $adress;
    
        /**
     * User zip.
     *
     * @var int
     */
    private $zip;
    
    /**
     * User city.
     *
     * @var string
     */

    private $city;

    /**
     * Game salt.
     *
     * @var string
     */
    private $salt;
    
    /**
     * User number.
     *
     * @var number
     */
    private $role;

        
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
        
    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
        
    public function getZip() {
        return $this->zip;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }
        
        
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
        
    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }
    
     public function getRole()

    {

        return $this->role;

    }


    public function setRole($role) {

        $this->role = $role;

    }


    /**

     * @inheritDoc

     */

    public function getRoles()

    {

        return array($this->getRole());

    }


    /**

     * @inheritDoc

     */

    public function eraseCredentials() {

        // Nothing to do here

    }
}