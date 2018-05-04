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
}
