<?php
require 'config.php';

class Connection
{
	private static $conn = null;

	public static function getConnection()
	{
		if (!self::$conn) {
			self::$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$conn;
	}
}