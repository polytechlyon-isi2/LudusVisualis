<?php

namespace LudusVisualis\Domain;

class Game
{
    /**
     * Game id.
     *
     * @var integer
     */
    private $id;

    /**
     * Game name.
     *
     * @var string
     */
    private $name;
    
    /**
     * Game descriptionLong.
     *
     * @var string
     */
    private $descriptionLong;
    
    /**
     * Game author.
     *
     * @var string
     */
    private $author;
    
    /**
     * Game year.
     *
     * @var integer
     */
    private $year;
    
        /**
     * Game image.
     *
     * @var string
     */
    private $image;
    
    /**
     * Game type.
     *
     * @var string
     */

    private $type;

    /**
     * Game price.
     *
     * @var integer
     */
    private $price;
    
    /**
     * Game number.
     *
     * @var number
     */
    private $number;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescritionLong() {
        return $this->DescriptionLong;
    }

    public function setDescriptionLong($DescriptionLong) {
        $this->DescriptionLong = $DescriptionLong;
    }
    
    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }
        
    public function getyear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }
        
    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
        
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
        
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
        
    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }
}