<?php

namespace app\resources;

use app\AbstractResource;
use app\src\Entity\Notes;

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

        $publicNotes = array_map(
            function (Notes $note) {
                return $note->getArray();
            },
            $publicNotes
        );

        return $publicNotes;

    }

}