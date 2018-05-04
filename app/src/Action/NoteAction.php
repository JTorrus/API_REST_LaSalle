<?php
/**
 * Created by PhpStorm.
 * User: Alumne
 * Date: 04/05/2018
 * Time: 18:54
 */

namespace app\src\Action;

use app\src\Entity\Notes;
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

    public function getAll(Request $request, Response $response, array $args)
    {
        /**
         * @var Notes[] $notes
         */
        $notes = $this->em->getRepository(Notes::class)->findAll();

        $notesToJson = array();

        foreach ($notes as $note) {
            $noteInfo = array();

            $noteInfo['id'] = $note->getId();
            $noteInfo['title'] = $note->getTitle();
            $noteInfo['content'] = $note->getContent();
            $noteInfo['private'] = $note->getPrivate();
            $noteInfo['tag1'] = $note->getTag1();
            $noteInfo['tag2'] = $note->getTag2();
            $noteInfo['tag3'] = $note->getTag3();
            $noteInfo['tag4'] = $note->getTag4();
            $noteInfo['book'] = $note->getBook();
            $noteInfo['createData'] = $note->getCreatedata();
            $noteInfo['lastModificationData'] = $note->getLastmodificationdata();
            $noteInfo['user'] = $note->getUser();

            $notesToJson[] = $noteInfo;
        }

        return $response->withJson($notesToJson, 200);
    }
}