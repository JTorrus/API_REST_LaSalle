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
    public function getMainPageAction()
    {
        $mainPage = array('code' => 200, 'msg' => 'LSNote API v0.1');
        return $mainPage;
    }

    /**
     * @return array
     */
    public function getAllAction()
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

    /**
     * @return array
     */
    public function getPublicAction()
    {
        /**
         * @var Notes[] $publicNotes
         */
        $publicNotes = $this->entityManager->getRepository(Notes::class)->findBy(array('private' => false));

        if (empty($publicNotes)) {
            $arr = array('code' => 204, 'msg' => 'No notes found');
            return $arr;
        } else {
            $publicNotes = array_map(
                function (Notes $note) {
                    return $note->getArray();
                },
                $publicNotes
            );

            $arr = array('code' => 200, 'msg' => $publicNotes);
            return $arr;
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function getOneAction($id)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if (empty($note)) {
            return array('code' => 204, 'msg' => 'No notes found with that id');
        } else {
            return array('code' => 200, 'msg' => $note->getArray());
        }
    }

    /**
     * @param $id
     * @return int
     */
    public function removeAction($id)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        try {
            $this->entityManager->remove($note);
            $this->entityManager->flush();
            return 200;
        } catch (ORMException $exception) {
            return 409;
        }
    }

    /**
     * @param $id
     * @param $tag
     * @return null
     * @throws ORMException
     */
    public function addTagOnNoteAction($id, $tag)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if (empty($note)) {
            return 204;
        } else {
            if (empty($note->getTag1())) {
                $note->setTag1($tag);
                $this->entityManager->merge($note);
                $this->entityManager->flush();
                return 200;
            } else {
                if (empty($note->getTag2())) {
                    $note->setTag2($tag);
                    $this->entityManager->merge($note);
                    $this->entityManager->flush();
                    return 200;
                } else {
                    if (empty($note->getTag3())) {
                        $note->setTag3($tag);
                        $this->entityManager->merge($note);
                        $this->entityManager->flush();
                        return 200;
                    } else {
                        if (empty($note->getTag4())) {
                            $note->setTag4($tag);
                            $this->entityManager->merge($note);
                            $this->entityManager->flush();
                            return 200;
                        } else {
                            return 409;
                        }
                    }
                }
            }
        }
    }
}