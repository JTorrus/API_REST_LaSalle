<?php

namespace app\src\Action;

use app\resources\NotesResource;
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

    public function getMainPage(Request $request, Response $response, array $args)
    {
        $mainPageToJson = $this->noteResource->resolveMainPage();
        return $response->withJson($mainPageToJson, 200);

    }

    public function getAll(Request $request, Response $response, array $args)
    {
        $notesToJson = $this->noteResource->getAllNotes();

        if ($notesToJson['code'] == 200) {
            return $response->withJson($notesToJson, 200);
        } else {
            return $response->withJson($notesToJson, 204);
        }

    }

    public function getPublic(Request $request, Response $response, array $args)
    {
        $publicNotesToJson = $this->noteResource->fetchAllPublicNotes();

        if ($publicNotesToJson['code'] == 200) {
            return $response->withJson($publicNotesToJson, 200);
        } else {
            return $response->withJson($publicNotesToJson, 204);
        }

    }

    public function getOne(Request $request, Response $response, array $args)
    {
        $id = $request->getParam('id');
        $noteToJson = $this->noteResource->fetchOne($id);

        if ($noteToJson['code'] == 200) {
            return $response->withJson($noteToJson, 200);
        } else {
            return $response->withJson($noteToJson, 204);
        }
    }


    public function removeOne(Request $request, Response $response, array $args)
    {
        $responseStatus = $response->getStatusCode();
        $id = $request->getParam('id');
        if ($responseStatus == 200) {
            $this->noteResource->deleteOne($id);
            $arr = array('code' => $responseStatus, 'msg' => 'Note deleted successfully');
            return $response->withJson($arr, $responseStatus);
        }
        $arr = array('code' => $responseStatus, 'msg' => 'No notes found');
        return $response->withJson($arr, $responseStatus);
    }


}