<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Book;

class BookDAO extends DAO
{
    /**
     * Return a list of all books, sorted by id.
     *
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "select * from book order by book_id";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }

    /**
     * Creates an Book object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \MicroCMS\Domain\Book
     */
    protected function buildDomainObject($row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);
        $book->setTitle($row['book_title']);
        return $book;
    }

    /**
     * Returns an book matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MicroCMS\Domain\Book|throws an exception if no matching book is found
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);
    }
}