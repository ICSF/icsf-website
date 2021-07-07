<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--include "stubs/headers.html"-->
		<title>Library Database Search - ICSF</title>
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
				<td><input name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ""; ?>" /></td>
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
				<td><input name="author" value="<?php echo isset($_GET['author']) ? $_GET['author'] : ""; ?>" /></td>
			</tr>
			<tr>
				<td>Series:</td>
				<td><input name="series" value="<?php echo isset($_GET['series']) ? $_GET['series'] : ""; ?>" /></td>
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

		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$offset = 50 * ($page - 1);

		$conditions->limit  = 50;
		$conditions->offset = $offset;

		$item  = null;
		$types = Database::getItemTypes();
		$count = Database::search($conditions, $items);
		$max   = min($count, $offset + 50);


		echo tabs(2) . '<h2>Search Results</h2>' . PHP_EOL;
		echo tabs(2) . '<h3>Showing ' . ($offset+1) . '&ndash;' . $max . ' of ' . $count . '</h3>' . PHP_EOL;

		pageLinks('<a href="?' . $_SERVER['QUERY_STRING'] . '&page=%1$d">%1$d</a>', $page, ceil($count / 50));

		echo tabs(2) . '<ul>' . PHP_EOL;
		foreach ($items as $item)
		{
			echo tabs(3) . '<li>' . $item->Author .
			' &nbsp;&mdash; &nbsp;<em>&ldquo;' . $item->Title . '&rdquo;</em>';

			if (!empty($item->Series))
				echo ' &nbsp;&mdash; &nbsp;' . $item->Series . ': ' . $item->SeriesNum;

			if ((int)$item->TypeKey !== 1)
				echo ' &nbsp;(<em>' . $types[$item->TypeKey]->name . '</em>)';

			echo '</li>' . PHP_EOL;
		}

		echo tabs(2) . '</ul>'. PHP_EOL;
		pageLinks('<a href="?' . $_SERVER['QUERY_STRING'] . '&page=%1$d">%1$d</a>', $page, ceil($count / 50));
	}

	function tabs($count)
	{
		return str_repeat("\t", $count);
	}

	function pageLinks($format, $curr, $max)
	{
		$max   = (int)$max;
		if ($max <= 1) return;
		$curr  = (int)$curr;
		$links = array(1, 2, 3, $max, $max - 1, $max - 2, $curr, $curr - 1, $curr + 1);
		$links = array_unique($links);
		$links = array_filter($links, function ($i) use($max) { return (0 < $i) && ($i <= $max); });

		sort($links, SORT_NUMERIC);
		$last = 0;

		foreach ($links as $link)
		{
			echo (($link - $last) !== 1) ? ' ... ' : ' ';
			printf($format, $link);
			$last = $link;
		}
	}
?>
		<!--include "stubs/footer.html"-->
	</body>
</html>
