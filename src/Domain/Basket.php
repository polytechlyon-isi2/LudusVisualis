<?php
namespace LudusVisualis\Domain;
class Basket 
{
    
    /**
     * Basket id.
     *
     * @var integer
     */
    private $id;
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    /**
     * User id.
     *
     * @var integer
     */
    private $userId;
    public function getUserId() {
        return $this->userId;
    }
    public function setUserid($userId) {
        $this->userId = $userId;
    }
    
    /**
     * Article id.
     *
     * @var integer
     */
    private $gameId;
    public function getGameId() {
        return $this->gameId;
    }
    public function setGameId($gameId) {
        $this->gameId = $gameId;
    }
    /**
     * Quantity
     *
     * @var integer
     */
    private $quantity;
    public function getQuantity() {
        return $this->quantity;
    }
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
   
}