<?php

namespace LudusVisualis\DAO;

use Doctrine\DBAL\Connection;
use LudusVisualis\Domain\Game;

class GameDAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $pdo;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Return a list of all games, sorted by date (most recent first).
     *
     * @return array A list of all games.
     */
    public function findAll() {
        $sql = "select * from VideoGames order by game_id desc";
        $result = $this->pdo->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $games = array();
        foreach ($result as $row) {
            $GameId = $row['game_id'];
            $games[$GameId] = $this->buildGame($row);
        }
        return $games;
    }

    /**
     * Creates a Game object based on a DB row.
     *
     * @param array $row The DB row containing Game data.
     * @return \LudusVisualis\Domain\Game
     */
    private function buildGame(array $row) {
        $game = new Game();
        $game->setId($row['game_id']);
        $game->setName($row['game_name']);
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