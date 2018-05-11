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

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getMainPage(Request $request, Response $response, array $args)
    {
        $mainPageToJson = $this->noteResource->getMainPageAction();
        return $response->withJson($mainPageToJson, 200);

    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAll(Request $request, Response $response, array $args)
    {
        $notesToJson = $this->noteResource->getAllAction();

        if ($notesToJson['code'] == 200) {
            return $response->withJson($notesToJson, 200);
        } else {
            return $response->withJson($notesToJson, 204);
        }

    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getPublic(Request $request, Response $response, array $args)
    {
        $publicNotesToJson = $this->noteResource->getPublicAction();

        if ($publicNotesToJson['code'] == 200) {
            return $response->withJson($publicNotesToJson, 200);
        } else {
            return $response->withJson($publicNotesToJson, 204);
        }

    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getOne(Request $request, Response $response, array $args)
    {
        $id = $request->getParam('id');
        $noteToJson = $this->noteResource->getOneAction($id);

        if ($noteToJson['code'] == 200) {
            return $response->withJson($noteToJson, 200);
        } else {
            return $response->withJson($noteToJson, 204);
        }
    }

    public function insert(Request $request, Response $response, array $args)
    {
        $bodyParameters = $request->getParsedBody();
        $responseMessage = $this->noteResource->insertAction($bodyParameters);
        return $response->withJson($responseMessage, $responseMessage['code']);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function remove(Request $request, Response $response, array $args)
    {
        $id = $request->getParam('id');
        $response->withStatus($this->noteResource->removeAction($id));

        $responseStatus = $response->getStatusCode();

        if ($responseStatus == 200) {
            $arr = array('code' => $responseStatus, 'msg' => 'Note deleted');
            return $response->withJson($arr, $responseStatus);
        } else {
            $arr = array('code' => $responseStatus, 'msg' => 'Note could not be deleted, try again');
            return $response->withJson($arr, $responseStatus);
        }
    }

    public function getAllWithTag(Request $request, Response $response, array $args)
    {
        $tag = $request->getParam('tag');
        $optionalSort = $request->getParam('sort') ?: null;

        $arrResult = $this->noteResource->getAllWithTagAction($tag, $optionalSort);
        return $response->withJson($arrResult, $arrResult['code']);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function addTagOnNote(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $id = $body['id'];
        $tag = $body['tag'];

        $responseStatus = $this->noteResource->addTagOnNoteAction($id, $tag);

        if ($responseStatus == 200) {
            $noteToJson = $this->noteResource->getOneAction($id);
            $arr = array('code' => $responseStatus, 'msg' => 'Note updated successfully', 'result' => $noteToJson);
            return $response->withJson($arr, $responseStatus);
        } else if ($responseStatus == 204) {
            $arr = array('code' => $responseStatus, 'msg' => 'No notes found');
            return $response->withJson($arr, $responseStatus);
        } else {
            $arr = array('code' => $responseStatus, 'msg' => 'The note has too much tags');
            return $response->withJson($arr, $responseStatus);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function removeTagOnNote(Request $request, Response $response, array $args)
    {
        $responseStatus = $response->getStatusCode();
        $body = $request->getParsedBody();

        $id = $body['id'];
        $tag = $body['tag'];

        if ($responseStatus == 200) {
            $newNote = $this->noteResource->removeTagOnOne($id, $tag);
            if ($newNote != null) {
                $arr = array('code' => $responseStatus, 'msg' => 'Note updated successfully', 'note' => $newNote);
                return $response->withJson($arr, $responseStatus);
            } else {

                $arr = array('code' => $responseStatus, 'msg' => 'The tag ' . $tag . " does not exists in this note");
                return $response->withJson($arr, $responseStatus);
            }

        }
        $arr = array('code' => $responseStatus, 'msg' => 'No notes found');
        return $response->withJson($arr, $responseStatus);
    }


    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function flipPrivate(Request $request, Response $response, array $args)
    {
        $data = $request->getParsedBody();

        $responseStatus = $response->getStatusCode();
        $id = $data['id'];

        if ($responseStatus == 200) {
            $newNote = $this->noteResource->flipPrivateOnOne($id);
            $arr = array('code' => $responseStatus, 'msg' => 'Note updated successfully', 'note' => $newNote);
            return $response->withJson($arr, $responseStatus);
        }
        $arr = array('code' => $responseStatus, 'msg' => 'No notes found');
        return $response->withJson($arr, $responseStatus);
    }
}