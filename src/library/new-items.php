<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--include "stubs/headers.html"-->
		<title>New Library Items - ICSF</title>
	</head>
	<body>

		<!--include "stubs/h1-start.html"-->
			New Items in the Library
		<!--include "stubs/h1-end.html"-->

		<nav>
			<!--include "stubs/nav-main.html"-->
			<hr/>
			<!--include "stubs/nav-lib.html"-->
		</nav>
<?php

	function pagelinks($page, $perpage, $total, $basename)
	{
		$total = ceil($total / $perpage);

		echo tabs(2) . '<div class="hang-right">Page: ' . PHP_EOL;

		if ($page > 1)
			echo tabs(3) . '&nbsp;<a href="' . $basename . '?page=1">1</a>' . PHP_EOL;

		if ($page > 3)
		{
			echo tabs(3) . '&nbsp; ... &nbsp;' . PHP_EOL;
			echo tabs(3) . '&nbsp;<a href="' . $basename . '?page=' . ($page-1) . '">' . ($page-1) . '</a>' . PHP_EOL;
		}
		else if ($page == 3)
			echo tabs(3) . '&nbsp;<a href="' . $basename . '?page=2">2</a>' . PHP_EOL;

		echo tabs(3) . '&nbsp;' . $page . PHP_EOL;

		if ($total > $page)
		{
			echo tabs(3) . '&nbsp;<a href="' . $basename . '?page=' . ($page+1) . '">' . ($page+1) . '</a>' . PHP_EOL;
		
			if ($total != $page + 1)
			{
				echo tabs(3) . '&nbsp; ... &nbsp;' . PHP_EOL;
				echo tabs(3) . '&nbsp;<a href="' . $basename . '?page=' . ($total) . '">' . ($total) . '</a>' . PHP_EOL;
			}
		}

		echo tabs(2) . '</div>' . PHP_EOL;
	}

	require('database/database.inc');

	$conditions = new SearchConditions();

	$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

	$conditions->order = 'YEAR(AcquireDate) DESC, MONTH(AcquireDate) DESC, ' . $conditions->order;
	$conditions->limit = 50;
	$conditions->offset = 50 * $page - 49;

	$types = Database::getItemTypes();
	$count = Database::search($conditions, $items);

	pagelinks($page, 50, $count, '<!--SRVROOT-->/library/new-items.php');

	$month = '';
	$cutoff = mktime(0,0,0,1,1,2005);

	foreach ($items as $item)
	{
		if (date('Ym', $item->acquireDate) !== $month)
		{
			$header = ($item->acquireDate < $cutoff ?
	            'Back in the mists of time... (pre-Apr 05)' :
				date('F Y', $item->acquireDate)
			);

			if ($month != '')
				echo tabs(2) . '</ul>' . PHP_EOL;

			echo PHP_EOL . tabs(2) . '<h2>' . $header . '</h2>' . PHP_EOL . tabs(2) . '<ul>' . PHP_EOL;

	        $month = date('Ym', $item->acquireDate);
	    }

		echo tabs(3) . '<li>' . $item->author . ' &nbsp;&mdash; &nbsp;<em>&ldquo;' . $item->title .
			'&rdquo;</em>';

		if (!empty($item->series))
			echo ' &nbsp;&mdash; &nbsp;' . $item->series . ': ' . $item->seriesNum;

		if ($item->type != 1)
			echo ' &nbsp;(' . $types[$item->type] . ')';

		echo '</li>' . PHP_EOL;
	}
	echo tabs(2) . '</ul>'. PHP_EOL;

	function tabs($count)
	{
		return str_repeat("\t", $count);
	}

	pagelinks($page, 50, $count, '<!--SRVROOT-->/library/new-items.php');

?>
		<!--include "stubs/footer.html"-->
	</body>
</html>
