<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Author;

class AuthorDAO extends DAO 
{
    /**
     * @var \MicroCMS\DAO\BookDAO
     */
    private $bookDAO;

    public function setBookDAO(BookDAO $bookDAO) {
        $this->bookDAO = $bookDAO;
    }

    /**
     * Return the author for an book.
     *
     * @param integer $bookId The book id.
     *
     * @return array A list of all infos for the author.
     */
    public function findAuthorBook($bookId) {
        // The associated book is retrieved only once
        $book = $this->bookDAO->find($bookId);

        // book_id is not selected by the SQL query
        // The book won't be retrieved during domain objet construction
        $sql = "select auth_id, auth_first_name, auth_last_name from author where auth_id=?";
        $result = $this->getDb()->fetchAll($sql, array($bookId));

        $author = new Author();
        $author->setId['auth_id']);
        $author->setFirstName['auth_first_name']);
        $author->setLastName['auth_last_name']);

        return $author;
    }
}