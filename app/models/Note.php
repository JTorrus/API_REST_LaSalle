<?php

class Note
{
    private $id;
    private $title;
    private $content;
    private $isPrivate;
    private $tag1;
    private $tag2;
    private $tag3;
    private $tag4;
    private $book;
    private $createData;
    private $lastModificationData;
    private $user;

    /**
     * Note constructor.
     * @param $id
     * @param $title
     * @param $content
     * @param $isPrivate
     * @param $tag1
     * @param $tag2
     * @param $tag3
     * @param $tag4
     * @param $book
     * @param $createData
     * @param $lastModificationData
     * @param $user
     */
    public function __construct($id, $title, $content, $isPrivate, $tag1, $tag2, $tag3, $tag4, $book, $createData, $lastModificationData, $user)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->isPrivate = $isPrivate;
        $this->tag1 = $tag1;
        $this->tag2 = $tag2;
        $this->tag3 = $tag3;
        $this->tag4 = $tag4;
        $this->book = $book;
        $this->createData = $createData;
        $this->lastModificationData = $lastModificationData;
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getisPrivate()
    {
        return $this->isPrivate;
    }

    /**
     * @param mixed $isPrivate
     */
    public function setIsPrivate($isPrivate): void
    {
        $this->isPrivate = $isPrivate;
    }

    /**
     * @return mixed
     */
    public function getTag1()
    {
        return $this->tag1;
    }

    /**
     * @param mixed $tag1
     */
    public function setTag1($tag1): void
    {
        $this->tag1 = $tag1;
    }

    /**
     * @return mixed
     */
    public function getTag2()
    {
        return $this->tag2;
    }

    /**
     * @param mixed $tag2
     */
    public function setTag2($tag2): void
    {
        $this->tag2 = $tag2;
    }

    /**
     * @return mixed
     */
    public function getTag3()
    {
        return $this->tag3;
    }

    /**
     * @param mixed $tag3
     */
    public function setTag3($tag3): void
    {
        $this->tag3 = $tag3;
    }

    /**
     * @return mixed
     */
    public function getTag4()
    {
        return $this->tag4;
    }

    /**
     * @param mixed $tag4
     */
    public function setTag4($tag4): void
    {
        $this->tag4 = $tag4;
    }

    /**
     * @return mixed
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param mixed $book
     */
    public function setBook($book): void
    {
        $this->book = $book;
    }

    /**
     * @return mixed
     */
    public function getCreateData()
    {
        return $this->createData;
    }

    /**
     * @param mixed $createData
     */
    public function setCreateData($createData): void
    {
        $this->createData = $createData;
    }

    /**
     * @return mixed
     */
    public function getLastModificationData()
    {
        return $this->lastModificationData;
    }

    /**
     * @param mixed $lastModificationData
     */
    public function setLastModificationData($lastModificationData): void
    {
        $this->lastModificationData = $lastModificationData;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }
}