<?php

namespace LudusVisualis\DAO;

use Doctrine\DBAL\Connection;
use LudusVisualis\Domain\Game;

class UserDAO extends DAO
{

    /**
     * Return a list of all games, sorted by date (most recent first).
     *
     * @return array A list of all games.
     */
    public function findAll() {
        $sql = "select * from users order by user_id desc";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $users = array();
        foreach ($result as $row) {
            $UserId = $row['user_id'];
            $users[$UserId] = $this->buildGame($row);
        }
        return $users;
    }

    /**
     * Creates a Game object based on a DB row.
     *
     * @param array $row The DB row containing Game data.
     * @return \LudusVisualis\Domain\Game
     */
    protected function buildDomainObject(array $row) {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setEmail($row['user_email']);
        $user->setPassword($row['user_password']);
        $user->setLastName($row['user_lastName']);
        $user->setFirstName($row['user_firstName']);
        $user->setAdresse($row['user_adresse']);
        $user->setZip($row['user_zip']);
        $user->setCity($row['user_city']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;
    }
}