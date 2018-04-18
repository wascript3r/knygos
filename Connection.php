<?php
require 'config.php';

class Connection
{
	private $conn;

	public function __construct()
	{
		try {
			$this->conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die('An unknown error occurred. Please try again later.');
		}
	}

	public function getConnection()
	{
		return $this->conn;
	}
}