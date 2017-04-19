<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 17/04/2017
 * Time: 18:12
 */

namespace TRIFin\Auth;


use TRIFin\Models\UserInterface;

class Auth implements AuthInterface
{

    private $jasnyAuth;

    /**
     * Auth constructor.
     */
    public function __construct(JasnyAuth $jasnyAuth)
    {
        $this->jasnyAuth = $jasnyAuth;
        $this->sessionStart();
    }

    public function login(array $credencials): bool
    {
        list('email' => $email , 'password' => $password )= $credencials;
        return $this->jasnyAuth->login($email, $password)!==null;
    }

    public function check(): bool
    {

        return $this->user()!=null;
    }


    public function logout(): void
    {
        $this->jasnyAuth->logout();
    }

    public function hashPassword(string $password): string
    {
        return $this->jasnyAuth->hashPassword($password);
    }

    protected function sessionStart(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

}

    public function user():?UserInterface
    {
       return $this->jasnyAuth->user();
    }
}