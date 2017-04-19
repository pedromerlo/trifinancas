<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 18/04/2017
 * Time: 17:23
 */

namespace TRIFin\Auth;


use Jasny\Auth\Sessions;
use Jasny\Auth\User;
use TRIFin\Repository\RepositoryInterface;

class jasnyAuth extends \Jasny\Auth
{

  use Sessions;

  private $repository;

    /**
     * jasnyAuth constructor.
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Fetch a user by ID
     *
     * @param int|string $id
     * @return User|null
     */
    public function fetchUserById($id)
    {
        return $this->repository->find($id, false);
    }

    /**
     * Fetch a user by username
     *
     * @param string $username
     * @return User|null
     */
    public function fetchUserByUsername($username)
    {
        return $this->repository->findByField('email', $username)[0];
    }
}