<?php

namespace app\src\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Created by PhpStorm.
 * User: Javier_T
 * Date: 5/4/2018
 * Time: 2:08 AM
 */
class NoteAction
{
    private $em;

    /**
     * NoteAction constructor.
     * @param $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getAll(Request $request, Response $response, array $args)
    {
        $notes = $this->em->getRepository('app\src\Entity\Note')->findAll();
        return $response->withJson($notes, 200);
    }
}