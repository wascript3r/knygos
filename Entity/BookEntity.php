<?php

class BookEntity
{
	private $bookId, $author, $title, $year;

	/**
	 * @return mixed
	 */
	public function getBookId()
	{
		return $this->bookId;
	}

	/**
	 * @param mixed $bookId
	 * @return BookEntity
	 */
	public function setBookId($bookId): self
	{
		$this->bookId = $bookId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * @param mixed $author
	 * @return BookEntity
	 */
	public function setAuthor($author): self
	{
		$this->author = $author;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 * @return BookEntity
	 */
	public function setTitle($title): self
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * @param mixed $year
	 * @return BookEntity
	 */
	public function setYear($year): self
	{
		$this->year = $year;
		return $this;
	}
}