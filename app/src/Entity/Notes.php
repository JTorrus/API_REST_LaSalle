<?php

namespace app\src\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes")
 * @ORM\Entity
 */
class Notes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="string", length=200, nullable=true)
     */
    private $content;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="private", type="boolean", nullable=true)
     */
    private $private;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag1", type="string", length=20, nullable=true)
     */
    private $tag1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag2", type="string", length=20, nullable=true)
     */
    private $tag2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag3", type="string", length=20, nullable=true)
     */
    private $tag3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag4", type="string", length=20, nullable=true)
     */
    private $tag4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book", type="string", length=50, nullable=true)
     */
    private $book;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="createData", type="date", nullable=true)
     */
    private $createdata;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastModificationData", type="date", nullable=true)
     */
    private $lastmodificationdata;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user", type="string", length=20, nullable=true)
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @return bool|null
     */
    public function getPrivate(): ?bool
    {
        return $this->private;
    }

    /**
     * @return null|string
     */
    public function getTag1(): ?string
    {
        return $this->tag1;
    }

    /**
     * @return null|string
     */
    public function getTag2(): ?string
    {
        return $this->tag2;
    }

    /**
     * @return null|string
     */
    public function getTag3(): ?string
    {
        return $this->tag3;
    }

    /**
     * @return null|string
     */
    public function getTag4(): ?string
    {
        return $this->tag4;
    }

    /**
     * @return null|string
     */
    public function getBook(): ?string
    {
        return $this->book;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedata(): ?\DateTime
    {
        return $this->createdata;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastmodificationdata(): ?\DateTime
    {
        return $this->lastmodificationdata;
    }

    /**
     * @return null|string
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return get_object_vars($this);
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param null|string $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param bool|null $private
     */
    public function setPrivate(?bool $private): void
    {
        $this->private = $private;
    }

    /**
     * @param null|string $tag1
     */
    public function setTag1(?string $tag1): void
    {
        $this->tag1 = $tag1;
    }

    /**
     * @param null|string $tag2
     */
    public function setTag2(?string $tag2): void
    {
        $this->tag2 = $tag2;
    }

    /**
     * @param null|string $tag3
     */
    public function setTag3(?string $tag3): void
    {
        $this->tag3 = $tag3;
    }

    /**
     * @param null|string $tag4
     */
    public function setTag4(?string $tag4): void
    {
        $this->tag4 = $tag4;
    }

    /**
     * @param null|string $book
     */
    public function setBook(?string $book): void
    {
        $this->book = $book;
    }

    /**
     * @param \DateTime|null $createdata
     */
    public function setCreatedata(?\DateTime $createdata): void
    {
        $this->createdata = $createdata;
    }

    /**
     * @param \DateTime|null $lastmodificationdata
     */
    public function setLastmodificationdata(?\DateTime $lastmodificationdata): void
    {
        $this->lastmodificationdata = $lastmodificationdata;
    }

    /**
     * @param null|string $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }


}
