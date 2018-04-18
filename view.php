<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'Connection.php';
$conn = (new Connection())->getConnection();

function redirect($url = '/knygos/') {
    header('Location: ' . $url);
    die();
}

if (!isset($_GET['id']))
    redirect();

$result = $conn->prepare('SELECT b.*, a.name AS author FROM Books b INNER JOIN Authors a ON a.authorId = b.authorId WHERE bookId = :bookId');
$result->execute([':bookId' => $_GET['id']]);
if ($result->rowCount() == 0)
    redirect();
$row = $result->fetch(PDO::FETCH_OBJ);

include 'partials/header.php';
?>
        <a href="/knygos/">Grįžti</a>
        <br><br>
		<table>
			<tr>
				<td><b>ID</b></td>
				<td><?= $row->bookId ?></td>
			</tr>
            <tr>
				<td><b>Author</b></td>
				<td><?= $row->author ?></td>
			</tr>
            <tr>
				<td><b>Title</b></td>
				<td><?= $row->title ?></td>
			</tr>
            <tr>
				<td><b>Year</b></td>
				<td><?= $row->year ?></td>
			</tr>
		</table>
<?php
include 'partials/footer.php';
?>