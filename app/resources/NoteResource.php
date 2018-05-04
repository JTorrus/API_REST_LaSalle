<?php

namespace app\resources;

use app\AbstractResource;
use app\src\Entity\Notes;

class NoteResource extends AbstractResource
{
    /**
     * @return array
     */
    public function fetchAllNotes()
    {
        /**
         * @var Notes[] $notes
         */
        $notes = $this->entityManager->getRepository(Notes::class)->findAll();

        $notes = array_map(
            function (Notes $note) {
                return $note->getArray();
            },
            $notes
        );

        return $notes;
    }
}