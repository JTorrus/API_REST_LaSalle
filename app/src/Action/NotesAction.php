<?php
/**
 * Created by PhpStorm.
 * User: Alumne
 * Date: 04/05/2018
 * Time: 18:54
 */

namespace app\src\Action;

use app\resources\NotesResource;
use app\src\Entity\Notes;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

class NotesAction
{
    private $noteResource;

    /**
     * NotesAction constructor.
     * @param $noteResource
     */
    public function __construct(NotesResource $noteResource)
    {
        $this->noteResource = $noteResource;
    }


    public function getAll(Request $request, Response $response, array $args)
    {
        $notesToJson = $this->noteResource->fetchAllNotes();
        return $response->withJson($notesToJson, 200);
    }

    public function getAllPublic(Request $request, Response $response, array $args) {
        $publicNotesToJson = $this->noteResource->fetchAllPublicNotes();

        if ($publicNotesToJson != null) {
            $arr = array('code' => 200, 'msg' => $publicNotesToJson);
            return $response->withJson($arr, 200);
        }
        $arr = array('code' => 204, 'msg' => 'No notes found');
        return $response->withJson($arr, 204);
    }


}