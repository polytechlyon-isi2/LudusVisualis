<?php

namespace LudusVisualis\DAO;

use Doctrine\DBAL\Connection;
use LudusVisualis\Domain\Game;

class GameDAO extends DAO
{

    /**
     * Return a list of all games, sorted by date (most recent first).
     *
     * @return array A list of all games.
     */
    public function findAll() {
        $sql = "select * from VideoGames order by game_id desc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $games = array();
        foreach ($result as $row) {
            $GameId = $row['game_id'];
            $games[$GameId] = $this->buildDomainObject($row);
        }
        return $games;
    }
    
      /**
     * Return a list of all games, sorted by date (most recent first).
     *
     * @return array A list of all games.
     */
    public function find($id) {
        $sql = $this->getDb()->prepare("select * from VideoGames where game_id=?");
        $sql->execute(array($id));
        $game = $this->getDb()->fetchAll($sql);
        return $game;
    }
    

    /**
     * Creates a Game object based on a DB row.
     *
     * @param array $row The DB row containing Game data.
     * @return \LudusVisualis\Domain\Game
     */
    protected function buildDomainObject(array $row) {
        $game = new Game();
        $game->setId($row['game_id']);
        $game->setName($row['game_name']);
        $game->setDescriptionShort($row['game_description_short']);
        $game->setDescriptionLong($row['game_description_long']);
        $game->setAuthor($row['game_author']);
        $game->setYear($row['game_year']);
        $game->setImage($row['game_image']);
        $game->setType($row['game_type']);
        $game->setPrice($row['game_price']);
        $game->setNumber($row['game_number']);
        return $game;
    }
}