<?php
require 'Connection.php';
$conn = (new Connection())->getConnection();

$result = $conn->query('SELECT bookId, title FROM Books b INNER JOIN Authors a ON a.authorId = b.authorId ORDER BY bookId DESC');

include 'partials/header.php';
?>
		<table>
			<tr>
				<th>ID</th>
				<th>Title</th>
			</tr>
		<?php
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			?>
			<tr>
				<td><?= $row->bookId ?></td>
				<td><a href="view.php?id=<?= $row->bookId ?>"><?= $row->title ?></a></td>
			</tr>
			<?php
		}
		?>
		</table>
<?php
include 'partials/footer.php';
?>