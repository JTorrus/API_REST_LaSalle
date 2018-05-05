<?php

namespace app\resources;

use app\AbstractResource;
use app\src\Entity\Notes;
use Doctrine\ORM\ORMException;

class NotesResource extends AbstractResource
{
    /**
     * @return array
     */
    public function resolveMainPage()
    {
        $mainPage = array('code' => 200, 'msg' => 'LSNote API v0.1');
        return $mainPage;
    }

    /**
     * @return array
     */
    public function getAllNotes()
    {
        /**
         * @var Notes[] $notes
         */
        $notes = $this->entityManager->getRepository(Notes::class)->findAll();

        if (empty($notes)) {
            $arr = array('code' => 204, 'msg' => 'No notes found');
            return $arr;
        } else {
            $notes = array_map(
                function (Notes $note) {
                    return $note->getArray();
                },
                $notes
            );

            $arr = array('code' => 200, 'msg' => $notes);
            return $arr;
        }
    }


    public function fetchAllPublicNotes()
    {
        $publicNotes = $this->entityManager->getRepository(Notes::class)->findBy(array('private' => false));

        if (empty($publicNotes)) {
            return null;
        }
        $publicNotes = array_map(
            function (Notes $note) {
                return $note->getArray();
            },
            $publicNotes
        );

        return $publicNotes;
    }


    public function fetchOne($id)
    {
        try {
            $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));
        } catch (ORMException $e) {
        }

        if (empty($note)) {
            return null;
        }

        return $note->getArray();
    }

    public function deleteOne($id)
    {
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));
        try {
            $this->entityManager->remove($note);
        } catch (ORMException $e) {
        }
    }


}