<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 19/04/2017
 * Time: 16:06
 */

namespace TRIFin\View\Twig;


use TRIFin\Auth\AuthInterface;

class TwigGlobals extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{

    /***
     * @var AuthInterface
     */
    private $auth1;


    /**
     * TwigGlobals constructor.
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth1 = $auth;
    }

    public function getGlobals()
    {
        return [
            'Auth' => $this->auth1
        ];
    }

}