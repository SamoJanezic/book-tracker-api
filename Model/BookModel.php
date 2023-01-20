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
        return $this->select("SELECT * FROM book WHERE id = $id");
    }
}