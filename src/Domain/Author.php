<?php

namespace MicroCMS\Domain;

class Author 
{
    /**
     * Author id.
     *
     * @var integer
     */
    private $id;

    /**
     * Author First Name.
     *
     * @var string
     */
    private $firstName;

    /**
     * Author Last Name.
     *
     * @var string
     */
    private $lastName;

    /**
     * Associated book.
     *
     * @var \MicroCMS\Domain\Book
     */
    private $book;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getBook() {
        return $this->book;
    }

    public function setBook(Book $book) {
        $this->book = $book;
    }
}