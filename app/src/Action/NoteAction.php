<?php
/**
 * Created by PhpStorm.
 * User: Alumne
 * Date: 04/05/2018
 * Time: 18:54
 */

namespace app\src\Action;

use app\resources\NoteResource;
use app\src\Entity\Notes;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

class NoteAction
{
    private $noteResource;

    /**
     * NoteAction constructor.
     * @param $noteResource
     */
    public function __construct(NoteResource $noteResource)
    {
        $this->noteResource = $noteResource;
    }


    public function getAll(Request $request, Response $response, array $args)
    {
        $notesToJson = $this->noteResource->fetchAllNotes();
        return $response->withJson($notesToJson, 200);
    }
}