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

	require('database/database.inc');

	$conditions = new SearchConditions();

	$conditions->order = 'YEAR(AcquireDate) DESC, MONTH(AcquireDate) DESC, ' . $conditions->order;
	$conditions->limit = 50;
	$conditions->offset = (isset($_GET['page']) ? ((int)$_GET['page'] - 1) * 50 + 1 : 1);

	$types = Database::getItemTypes();
	$count = Database::search($conditions, $items);

	//printPageLinks($count, $lim, $int);

	$month = '';
	$cutoff = mktime(0,0,0,1,1,2005);

	foreach ($items as $item)
	{
		if (date('Ym', $item->acquireDate) !== $month)
		{
			$header = ($item->acquireDate < $cutoff ?
	            'Back in the mists of time... (pre-Apr 05)' :
				date('F Y')
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

	//printPageLinks($count, $lim, $int, $params);

?>
		<!--include "stubs/footer.html"-->
	</body>
</html>
