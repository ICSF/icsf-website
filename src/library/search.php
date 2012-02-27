<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--include "stubs/headers.html"-->
		<title>New Library Items - ICSF</title>
	</head>
	<body>

		<!--include "stubs/h1-start.html"-->
			Search the Library
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr/>
			<!--include "stubs/nav-lib.html"-->
		</nav>

		<form action="<!--SRVROOT-->/library/search.php" method="get">
			<table>
			<tr>
				<td>Title:</td>
				<td><input name="title" value="<?php echo $_GET['title']; ?>" /></td>
				<td rowspan="3">
					<input type="submit" style="
						font-size:1.5em;
						min-height: 2.5em;
						min-width: 10em;
						background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e8e8e8), color-stop(1, #d8d8d8) );
						background:-moz-linear-gradient( center top, #e8e8e8 5%, #d8d8d8 100% );
						background-color:#e8e8e8;
						border-radius:9px;
						border: 2px solid #bbb;
						color:#555;
						text-align: center;
					" value="Search" />
				</td>
			</tr>
			<tr>
				<td>Author:</td>
				<td><input name="author" value="<?php echo $_GET['author']; ?>" /></td>
			</tr>
			<tr>
				<td>Series:</td>
				<td><input name="series" value="<?php echo $_GET['series']; ?>" /></td>
			</tr>
			</table>
		</form>
<?php

	require('database/database.inc');

	if (isset($_GET['title']))
	{
		$conditions = new SearchConditions();

		$conditions->title  = $_GET['title'];
		$conditions->author = $_GET['author'];
		$conditions->series = $_GET['series'];

		$conditions->limit = 50;
		$conditions->offset = (isset($_GET['page']) ? ((int)$_GET['page'] - 1) * 50 + 1 : 1);

		$types = Database::getItemTypes();
		$count = Database::search($conditions, $items);

		//printPageLinks($count, $lim, $int);

		echo tabs(2) . '<h2>Search Results</h2>' . PHP_EOL;
		echo tabs(2) . '<h3>Showing 1 - 50 of ' . $count . '</h3>' . PHP_EOL;

		echo tabs(2) . '<ul>' . PHP_EOL;
		foreach ($items as $item)
		{
			echo tabs(3) . '<li>' . $item->author .
			' &nbsp;&mdash; &nbsp;<em>&ldquo;' . $item->title . '&rdquo;</em>';

			if (!empty($item->series))
				echo ' &nbsp;&mdash; &nbsp;' . $item->series . ': ' . $item->seriesNum;

			if ($item->type != 1)
				echo ' &nbsp;(' . $types[$item->type] . ')';

			echo '</li>' . PHP_EOL;
		}

		echo tabs(2) . '</ul>'. PHP_EOL;
	}

	function tabs($count)
	{
		return str_repeat("\t", $count);
	}

	//printPageLinks($count, $lim, $int, $params);

?>
		<!--include "stubs/footer.html"-->
	</body>
</html>
