<?php

namespace MicroCMS\DAO;


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use MicroCMS\Domain\User;

class UserDAO extends DAO implements UserProviderInterface
{

    /**

     * Returns a user matching the supplied id.

     *

     * @param integer $id The user id.

     *

     * @return \MicroCMS\Domain\User|throws an exception if no matching user is found

     */

    public function find($id) {

        $sql = "select * from t_user where usr_id=?";

        $row = $this->getDb()->fetchAssoc($sql, array($id));


        if ($row)

            return $this->buildDomainObject($row);

        else

            throw new \Exception("No user matching id " . $id);

    }


    /**

     * {@inheritDoc}

     */

    public function loadUserByUsername($username)

    {

        $sql = "select * from user where user_name=?";

        $row = $this->getDb()->fetchAssoc($sql, array($username));


        if ($row)

            return $this->buildDomainObject($row);

        else

            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));

    }


    

    public function refreshUser(UserInterface $user)

    {

        $class = get_class($user);

        if (!$this->supportsClass($class)) {

            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));

        }

        return $this->loadUserByUsername($user->getUsername());

    }


    public function supportsClass($class)

    {
        return 'LudusVisualis\Domain\User' === $class;

    }
    protected function buildDomainObject($row) {
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