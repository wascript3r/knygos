<?php
require 'Connection.php';
require 'Repository/BookRepository.php';

$repo = new BookRepository();
$books = $repo->getAll();

include 'partials/header.php';
?>
		<table>
			<tr>
				<th>ID</th>
				<th>Title</th>
			</tr>
		<?php
		foreach ($books as $book) {
			?>
			<tr>
				<td><?= $book->getBookId() ?></td>
				<td><a href="view.php?id=<?= $book->getBookId() ?>"><?= $book->getTitle() ?></a></td>
			</tr>
			<?php
		}
		?>
		</table>
<?php
include 'partials/footer.php';
?>