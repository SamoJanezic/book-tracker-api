<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class BookModel extends Database
{
    public function getBooks($limit, $offset)
    {
        return $this->select("SELECT * FROM book ORDER BY id ASC LIMIT ? OFFSET ?", ['ii', $limit, $offset]);
    }
    public function getSingleBook($id)
    {
        return $this->select("SELECT * FROM book WHERE id=?", ['i', $id]);
    }
    public function deleteBook($id)
    {
        return $this->delete("DELETE FROM book WHERE id=?", ['i', $id]);
    }
    public function addBook($title, $author, $description, $pages, $publisher, $publicationYear, $image, $series)
    {
        return $this->insert("INSERT INTO book (id, title, author, description, pages, publisher, publicationYear, image, series)
        VALUES(NULL, ?,?,?,?,?,?,?,?)", ["ssssssss", $title, $author, $description, $pages, $publisher, $publicationYear, $image, $series]);
    }
    public function editBook($id, $title, $author, $description, $pages, $publisher, $publicationYear, $image, $series)
    {
        return $this->update("UPDATE book
                              SET title = ?,
                              author = ?,
                              description = ?,
                              pages = ?,
                              publisher = ?,
                              publicationYear = ?,
                              image = ?,
                              series = ?
                              WHERE id=?", ['ssssssssi', $title, $author, $description, $pages, $publisher, $publicationYear, $image, $series, $id]);
    }
}