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

<?php

	require('database/database.php');

	$conditions = new SearchConditions();

	$conditions->order = 'YEAR(AcquireDate) DESC, MONTH(AcquireDate) DESC, ' . $conditions->order;
	$conditions->limit = 50;
	$conditions->offset = (isset($_GET['page']) ? ((int)$_GET['page'] - 1) * 50 + 1 : 1);

	$count = LibraryDatabase::search($conditions, $results);

	//printPageLinks($count, $lim, $int);

	$month = '';
	$cutoff = mktime(0,0,0,1,1,2005);

	foreach ($items as $item)
	{
		if (date('Ym', $item->acquireDate) !== $month)
		{
			$header ($item->acquireDate < $cutoff ?
	            'Back in the mists of time... (pre-Apr 05)' :
				date('F Y')
			);

			if ($month != '')
				echo '</ul>' . PHP_EOL;

			echo '<h2>' . $header . '</h2>' . PHP_EOL . '<ul>';

	        $month = date('Ym', $item->acquireDate);
	    }

		echo '<li>' . $item->author . ' - "<em>' . $item->title .
			'</em></li>';
		// TODO: Series info
		// TODO: ItemType info
	}
	echo '</ul>';

	//printPageLinks($count, $lim, $int, $params);

?>
	</body>
</html>
