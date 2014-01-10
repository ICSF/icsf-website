<?php

	include("config.php");

	mysql_connect('localhost', 'scc_icsf', $password) or die('conenct failed');
	mysql_select_db('scc_icsf') or die('select db failed');

	header('Content-Type: text/plain');

	$fields = array('contact', 'contact_all', 'ww', 'rpg', 'group', 'aff', 'ff_1','ff_2','ff_3','ff_4','ff_5');

	foreach ($fields as $field) {
		$data = mysql_query("SELECT `$field`, COUNT(*) FROM picocon_prereg GROUP BY `$field`");
		printf(PHP_EOL . $field . mysql_error() . PHP_EOL);
		while ($row = mysql_fetch_row($data))
			printf('%40s | %3d' . PHP_EOL, $row[0], $row[1]);
	}
