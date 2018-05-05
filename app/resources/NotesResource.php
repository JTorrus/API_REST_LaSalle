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
    public function getAllNotes()
    {
        /**
         * @var Notes[] $notes
         */
        $notes = $this->entityManager->getRepository(Notes::class)->findAll();

        if (empty($notes)) {
            return null;
        } else {
            $notes = array_map(
                function (Notes $note) {
                    return $note->getArray();
                },
                $notes
            );

            return $notes;
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