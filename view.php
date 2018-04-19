<?php
require 'Connection.php';
require 'Repository/BookRepository.php';

function redirect($url = '/knygos/') {
    header('Location: ' . $url);
    die();
}

if (!isset($_GET['id']))
    redirect();

$repo = new BookRepository();
$book = $repo->getById($_GET['id']);

if (!$book)
    redirect();

include 'partials/header.php';
?>
        <a href="/knygos/">Grįžti</a>
        <br><br>
		<table>
			<tr>
				<td><b>ID</b></td>
				<td><?= $book->getBookId() ?></td>
			</tr>
            <tr>
				<td><b>Author</b></td>
				<td><?= $book->getAuthor() ?></td>
			</tr>
            <tr>
				<td><b>Title</b></td>
				<td><?= $book->getTitle() ?></td>
			</tr>
            <tr>
				<td><b>Year</b></td>
				<td><?= $book->getYear() ?></td>
			</tr>
		</table>
<?php
include 'partials/footer.php';
?>