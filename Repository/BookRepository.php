<?php
require_once 'Connection.php';
require 'Entity/BookEntity.php';

class BookRepository
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::getConnection();
	}

	public function getAll()
	{
		$result = $this->conn->query('SELECT bookId, title FROM Books b INNER JOIN Authors a ON a.authorId = b.authorId ORDER BY bookId DESC');
		$arr = [];
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$obj = new BookEntity();
			$obj
				->setBookId($row->bookId)
				->setTitle($row->title);
			$arr[] = $obj;
		}
		return $arr;
	}

	public function getById($id)
	{
		$result = $this->conn->prepare('SELECT b.*, a.name AS author FROM Books b INNER JOIN Authors a ON a.authorId = b.authorId WHERE bookId = :bookId');
		$result->execute([':bookId' => $id]);
		if ($result->rowCount() == 0)
			return null;
		$row = $result->fetch(PDO::FETCH_OBJ);
		$obj = new BookEntity();
		$obj
			->setBookId($row->bookId)
			->setAuthor($row->author)
			->setTitle($row->title)
			->setYear($row->year);
		return $obj;
	}
}