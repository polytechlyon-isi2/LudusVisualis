<?php
namespace LudusVisualis\DAO;
use LudusVisualis\Domain\Basket;
use LudusVisualis\Domain\Article;
class BasketDAO extends DAO
{
    
    /**
     * Returns an basket matching user id
     *
     * @param integer $id
     *
     * @return \LudusVisualis\Domain\Article
     */
    public function findAllByUser($id) {
        $sql = "SELECT * FROM Basket Natural join VideoGames WHERE user_id=?";
        return $this->getDb()->fetchAll($sql, array($id));
        
    }
    
    
    
    public function deleteOrder($id) {
         $this->getDb()->delete('Basket', array('basket_id' => $id));
    }
    
    /**
     * Creates an Basket object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \LudusVisualis\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $basket = new Basket();
        $basket->setId($row['basket_id']);
        $basket->setUserid($row['user_id']);
        $basket->setGameId($row['game_id']);
        $basket->setQuantity($row['bas_quantity']);
        return $basket;
    }
    
    
    /**
     * Saves a comment into the database.
     *
     * @param \sellDreams\Domain\Basket $basket The comment to save
     */
    public function save(Basket $basket) {
        $basketData = array(
            'user_id' => $basket->getUserId(),
            'game_id' => $basket->getGameId(),
            'bas_quantity' => $basket->getQuantity()
            );
        // The article has never been saved : insert it
        $this->getDb()->insert('Basket', $basketData);
        // Get the id of the newly created comment and set it on the entity.
        $id = $this->getDb()->lastInsertId();
        $basket->setId($id);
    }
    
        public function sumQuantity($baskets){
        $total = 0;
        foreach($baskets as $basket){
            $total = $total + $basket->getQuantity()*$basket->getValue();
        }
        return $total;
    }
    
    /**
     * Removes a game command from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('Basket', array('bas_id' => $id));
    }
    
    /**
     * @param $baskets array of basket
     * return total price
     */
    /*
    public function sumQuantity($baskets){
        $total = 0;
        foreach($baskets as $basket){
            $total = $total + $basket->getQuantity()*$basket->getValue();
        }
        return $total;
    }
    */
}