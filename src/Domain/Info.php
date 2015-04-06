<?php

namespace MicroCMS\Domain;

class Info 
{
    /**
     * Info id.
     *
     * @var integer
     */
    private $id;

    /**
     * Info author.
     *
     * @var string
     */
    private $author;

    /**
     * Info content.
     *
     * @var integer
     */
    private $content;

    /**
     * Associated book.
     *
     * @var \MicroCMS\Domain\Article
     */
    private $book;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getBook() {
        return $this->book;
    }

    public function setBook(Article $book) {
        $this->book = $book;
    }
}