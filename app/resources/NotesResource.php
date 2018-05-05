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
    public function mainPageAction()
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
            return 204;
        }
    }

    /**
     * @param $id
     * @param $tag
     * @return array|null
     * @throws ORMException
     */
    public function addTagOnOne($id, $tag)
    {
        /** @var Notes $note */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if (empty($note->getTag1())) {
            $note->setTag1($tag);
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } elseif (empty($note->getTag2())) {
            $note->setTag2($tag);
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } elseif (empty($note->getTag3())) {
            $note->setTag3($tag);
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } elseif (empty($note->getTag4())) {
            $note->setTag4($tag);
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } else {
            return null;
        }
        return $note->getArray();
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