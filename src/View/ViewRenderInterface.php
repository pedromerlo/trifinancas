<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 10/04/2017
 * Time: 19:08
 */
declare(strict_types=1);

namespace TRIFin\View;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ViewRenderInterface
 * @package TRIFin\View
 */
interface ViewRenderInterface
{
    public function render(string $template, array $context=[]): ResponseInterface;
}