<?php

namespace LudusVisualis\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use LudusVisualis\Domain\User;

class UserDAO extends DAO implements UserProviderInterface
{
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \ LudusVisualis\Domain\User|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from t_user where user_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUserName());
    }
    
    /**
     * Saves a user into the database.
     *
     * @param \LudusVisualis\Domain\User $user The user to save
     */
    public function save(User $user) {
        $sql = "select Max(user_id) from Users";
        $result = $this->getDb()->fetchColumn($sql);
        echo($result[0]);
        $id=$result[0]+1;
        echo($id);
        $userData = array(   
            'user_id'=>$id,
            'user_email' => $user->getEmail(),
            'user_password' => $user->getPassword(),
            'user_lastName' => $user->getUserLastname(),
            'user_firstName' => $user->getUsername(),  
            'user_adresse' => $user->getAdress(),
            'user_zip' => $user->getZip(),
            'user_city' => $user->getCity(),       
            'user_salt' => $user->getSalt(),
            'user_role' => $user->getRole()
            );
        $this->getDb()->insert('users', $userData);
    }
    
    public function loadUserByUsername($firstName)

    {
        $sql = "select * from users where user_firstName=?";
        $row = $this->getDb()->fetchAssoc($sql, array($firstName));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $email));
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return ' LudusVisualis\Domain\User' === $class;
    }
    
    public function getUsername($username){
        $sql = "select * from users where user_firstName=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
    }

    /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \ LudusVisualis\Domain\User
     */
    protected function buildDomainObject(array $row) {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setEmail($row['user_email']);
        $user->setPassword($row['user_password']);
        $user->setUserLastName($row['user_lastName']);
        $user->setUserName($row['user_firstName']);
        $user->setAdress($row['user_adresse']);
        $user->setZip($row['user_zip']);
        $user->setCity($row['user_city']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;   
    }
}
    
