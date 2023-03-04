<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class BookModel extends Database
{
    public function getBooks($limit)
    {
        return $this->select("SELECT * FROM book ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
    public function getSingleBook($id)
    {
        return $this->select("SELECT * FROM book WHERE id=$id");
    }
    public function deleteBook($id)
    {
        return $this->select("DELETE FROM book WHERE id=?", ["i", $id]);
    }
    public function addBook($title, $author, $description, $pages, $publisher, $publicationYear, $image, $series)
    {
        return $this->select("INSERT INTO book (id, title, author, description, pages, publisher, publicationYear, image, series)
        VALUES(NULL, '$title', '$author', '$description', '$pages', '$publisher', '$publicationYear', '$image', '$series')");
        //   ["i", $title, $author, $description, $pages, $publicationYear, $image]);
    }
    public function editBook($id, $title, $author, $description, $pages, $publicationYear, $image)
    {
        return $this->select("UPDATE book
                              SET title = $title,
                                  author = $author,
                                  description = $description,
                                  pages = $pages,
                                  publisher = $publisher
                                  publicationYear = $publicationYear,
                                  image = $image;
                              WHERE $id");
    }
}