<?php
/**
 * Created by PhpStorm.
 * User: Alumne
 * Date: 04/05/2018
 * Time: 18:54
 */

namespace app\src\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

class NoteAction
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * NoteAction constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll(Request $request, Response $response, array $args) {
        //$notes = $this->em->getRepository('\App\src\Entity\Note')->findAll();
        $notes = array();
        $notes["hola"] = "adios";
        return $response->withJson($notes, 200);
    }
}