<?php

namespace app\resources;

use app\AbstractResource;
use app\src\Entity\Notes;
use DateTime;
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
     * @param $bodyParameters
     * @return array|null
     */
    public function insertAction($bodyParameters) {
        $arr = null;

        $title = $bodyParameters["title"];
        $content = $bodyParameters["content"];
        $private = $bodyParameters["private"];
        $tag1 = $bodyParameters["tag1"];
        $tag2 = $bodyParameters["tag2"];
        $tag3 = $bodyParameters["tag3"];
        $tag4 = $bodyParameters["tag4"];
        $book = $bodyParameters["book"];
        $createData = new DateTime();

        $notes = new Notes;
        $notes->setTitle($title);
        $notes->setContent($content);
        $notes->setPrivate($private);
        $notes->setTag1($tag1);
        $notes->setTag2($tag2);
        $notes->setTag3($tag3);
        $notes->setTag4($tag4);
        $notes->setBook($book);
        $notes->setCreatedata($createData);

        if ($title != "" || $title != null) {
            try {
                $this->entityManager->persist($notes);
                $this->entityManager->flush($notes);
                $arr = array('code' => 200, 'msg' => 'Note inserted');
            } catch (ORMException $e) {
                $arr = array('code' => 409, 'msg' => 'Could not insert the note');
            }
        } else {
            $arr = array('code' => 409, 'msg' => 'Title must not be null');
        }

        return $arr;
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
                $this->entityManager->persist($note);
                $this->entityManager->flush();
                return 200;
            } elseif (empty($note->getTag2())) {
                $note->setTag2($tag);
                $this->entityManager->persist($note);
                $this->entityManager->flush();
                return 200;
            } elseif (empty($note->getTag3())) {
                $note->setTag3($tag);
                $this->entityManager->persist($note);
                $this->entityManager->flush();
                return 200;
            } elseif (empty($note->getTag4())) {
                $note->setTag4($tag);
                $this->entityManager->persist($note);
                $this->entityManager->flush();
                return 200;
            } else {
                return 409;
            }
        }
    }

    /**
     * @param $id
     * @param $tag
     * @return array|null
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function removeTagOnOne($id, $tag)
    {
        /** @var Notes $note */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if ($note->getTag1() == $tag) {
            $note->setTag1("");
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } elseif ($note->getTag2() == $tag) {
            $note->setTag2("");
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } elseif ($note->getTag3() == $tag) {
            $note->setTag3("");
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } elseif ($note->getTag4() == $tag) {
            $note->setTag4("");
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } else {
            return null;
        }

        return $note->getArray();
    }

    /**
     * @param $id
     * @return array
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flipPrivateOnOne($id)
    {
        /** @var Notes $note */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        $note->setPrivate(!$note->getPrivate());

        $this->entityManager->merge($note);
        $this->entityManager->flush();

        return $note->getArray();
    }
}